<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class CategorySeeder extends Seeder
{
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('categories')->truncate();
        DB::table('categories')->insert(
            [
            ['name' => 'Breakfast'],
            ['name' => 'Lunch'],
            ['name' => 'Dinner'],
            ['name' => 'Desserts'],
            ['name' => 'Beverages'],
            ['name' => 'Snacks'],
            ['name' => 'Appetizers'],
        ]);

       
    }
}
