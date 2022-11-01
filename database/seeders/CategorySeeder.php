<?php

namespace Database\Seeders;

use App\HelpersFunction\Constants;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Constants::categories_list as $list){
            BlogCategory::updateorcreate([
                'category_name' => $list
            ],[
                'category_name' => $list,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
