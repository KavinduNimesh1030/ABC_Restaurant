<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        User::create([
            'first_name' => "Admin",
            'last_name' => "test",
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
        ])->assignRole('admin');
        Schema::disableForeignKeyConstraints();
    }
}
