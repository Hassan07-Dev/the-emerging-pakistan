<?php

namespace Database\Factories;

use App\HelpersFunction\Constants;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    protected $model = Blog::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=> User::all()->pluck('id')->random(),
            'category_id'=> BlogCategory::all()->pluck('id')->random(),
            'arthur'=> $this->faker->name,
            'blog_image'=> $this->faker->image,
            'title'=>$this->faker->sentence(10),
            'description'=>$this->faker->paragraph(350),
            'excerpt'=>$this->faker->paragraph(20),
            'status'=> Constants::STATUS,
        ];
    }
}
