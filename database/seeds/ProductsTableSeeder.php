<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();
        for ($i=0;$i<100;$i++){
            DB::table('products')->insert([
                'name' => '"サンプル".$i',
                'description' => 'サンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプル',
                'img_path' => '',
                'price' => mt_rand(300,10000),
                'stock' => mt_rand(0,30),
                'category_id' => mt_rand(1,3),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }


    }
}
