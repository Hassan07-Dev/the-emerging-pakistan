<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    protected $fillable = ['category_name', 'category_image', 'status'];

    public function blog(){
        return $this->hasOne (Blog::class, 'category_id', 'id');
    }
}
