<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientTestimonials extends Model
{
    use HasFactory;

    protected $table = 'client_testimonials';

    protected $fillable = ['short_comment', 'client_image', 'client_name', 'designation', 'status'];
}
