<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = Admin::updateOrCreate(['id' => 1],  [
            'username' => 'The Emerging Pakistan',
            'email' => 'admin@theemergingpakistan.com',
            'email_verified_at'=>\Carbon\Carbon::now(),
            'password' => bcrypt('tep@123456'),
            'gender' => 'Male'
        ]);
    }
}
