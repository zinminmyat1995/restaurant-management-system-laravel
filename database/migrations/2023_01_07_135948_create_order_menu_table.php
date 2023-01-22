<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_menu', function (Blueprint $table) {
            $table->id();
            $table->string('shop_code');
            $table->integer('order_id');
            $table->string('menu_code');
            $table->integer('count');
            $table->integer('price');
            $table->integer('total_price');
            $table->softDeletes('deleted_at');
            $table->string('created_emp');
            $table->string('updated_emp');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_menu');
    }
}
