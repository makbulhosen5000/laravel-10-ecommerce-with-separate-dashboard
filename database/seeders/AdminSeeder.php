<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
         $admin = [
        'name' => 'admin',
        'phone' => '01782283171',
        'email' => 'admin@gmail.com',
        'address' => 'Brahmanbaria',
        'password' => bcrypt('3800580ak')
    ];
        Admin::create($admin);
    }
}
