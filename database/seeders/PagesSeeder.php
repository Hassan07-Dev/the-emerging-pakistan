<?php

namespace Database\Seeders;

use App\HelpersFunction\Constants;
use App\Models\BlogCategory;
use App\Models\Page;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Constants::pages as $page){
            Page::updateorcreate([
                'page_name' => $page
            ],[
                'page_name' => $page,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
