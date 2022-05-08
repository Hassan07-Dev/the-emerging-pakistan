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
            'username' => 'Digital Agency Pakistan',
            'email' => 'admin@dap.com',
            'email_verified_at'=>\Carbon\Carbon::now(),
            'password' => bcrypt('123456'),
            'gender' => 'Male'
        ]);
    }
}
