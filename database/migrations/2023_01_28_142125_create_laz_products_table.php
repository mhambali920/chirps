<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laz_products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('product_name');
            $table->integer('base_price')->nullable();
            $table->string('lazada_sku')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laz_products');
    }
};
