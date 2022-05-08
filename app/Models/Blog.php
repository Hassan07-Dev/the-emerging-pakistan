<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['category_id' ,'tag_id' ,'arthur' ,'blog_image' ,'title' ,'slug' ,'description' ,'status' ];

    public function category(){
        return $this->belongsTo (BlogCategory::class, 'category_id', 'id');
    }

    public function getTagIdAttribute($value){
        $value = json_decode ($value);
        return Tag::whereIn('id', $value)->get();
    }

    /**
     * Boot the model.
    */
    protected static function boot()
    {
        parent::boot();
        static::created(function ($post) {
            $post->slug = $post->createSlug($post->title);
            $post->save();
        });
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    private function createSlug($title){
        if (static::whereSlug($slug = Str::slug($title))->exists()) {
            $max = static::whereTitle($title)->latest('id')->skip(1)->value('slug');
            if (is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function ($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }

}
