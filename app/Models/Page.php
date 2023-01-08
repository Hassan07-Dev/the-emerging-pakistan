<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $table = 'pages_data';

    protected $fillable = ['page_name', 'title', 'description', 'keywords', 'status'];
}
