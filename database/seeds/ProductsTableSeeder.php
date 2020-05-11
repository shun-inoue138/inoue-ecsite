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
           /* for ($i=0;$i<100;$i++){
                $color = mt_rand('青い','白い','赤い');
                $item = mt_rand('マフラー','ネックレス','ブレスレット');

                DB::table('products')->insert([
                    'name' => $color.$item ,
                    'description' => $color.$item.'です。',
//                    'img_path' => '',
                    'price' => mt_rand(300,10000),
                    'stock' => mt_rand(0,30),
                    'category_id' => switch (),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);*/
        }



}
