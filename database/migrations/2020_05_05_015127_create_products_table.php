<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name','50');
            $table->string('description','300');
            $table->integer('price');
            $table->string('img_path','300')->nullable();
            $table->integer('category_id');
            $table->integer('stock');

        });
        DB::table('products')->truncate();
        for ($i=0;$i<8;$i++){
            DB::table('products')->insert([
                'name' => 'サンプルプロダクト',
                'description' => 'サンプルサンプルサンプル',
                'price' => '1000',
                'category_id' => '1',
                'stock' => '10',
            ]);
        }


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
