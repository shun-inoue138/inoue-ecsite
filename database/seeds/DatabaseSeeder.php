<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
    }
}

DB::table('categories')->truncate();
DB::table('categories')->insert([
    'name' => 'ブレスレット'
]);
DB::table('categories')->insert([
    'name' => 'ネックレス'
]);
DB::table('categories')->insert([
    'name' => 'マフラー'
]);
