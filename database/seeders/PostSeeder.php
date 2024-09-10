<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('posts')->truncate();
        DB::table('posts')->insert(
            [
                [
                    'name' => "General Manager",
                ],
                [
                    'name' => "Hotel Manager",
                ],
                [
                    'name' => "Human Resource",
                ],
                [
                    'name' => "Marketing Manager",
                ]
              
            ]


        );
        Schema::enableForeignKeyConstraints();
    }
}
