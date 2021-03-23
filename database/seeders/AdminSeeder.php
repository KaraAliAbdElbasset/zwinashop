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
    public function run(): void
    {
        Admin::create([
           'name' => 'Web Site Owner',
           'role' => 'owner',
           'email' => 'admin@email.com',
           'password' => bcrypt('password'),
        ]);
    }
}
