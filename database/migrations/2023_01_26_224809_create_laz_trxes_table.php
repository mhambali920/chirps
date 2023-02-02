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
        Schema::create('laz_trxes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->date('transaction_date');
            $table->string('transaction_type');
            $table->string('fee_name');
            $table->text('details')->nullable();
            $table->string('seller_sku')->nullable();
            $table->string('lazada_sku')->nullable();
            $table->integer('amount');
            $table->string('order_no');
            $table->string('order_item_no')->nullable();
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
        Schema::dropIfExists('laz_trxes');
    }
};
