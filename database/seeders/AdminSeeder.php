<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::query()->where('name', 'admin')->exists()) {
            User::create(['name' => 'admin', 'password' => 'admin']);
        }
    }
}
