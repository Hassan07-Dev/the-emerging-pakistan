<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    protected $table = "blog_categories";

    protected $fillable = ['category_name', 'category_image', 'status'];

    public function blog(){
        return $this->hasMany (Blog::class, 'category_id', 'id')->where('status', '1')
            ->orderBy('created_at', 'DESC');
    }
}
