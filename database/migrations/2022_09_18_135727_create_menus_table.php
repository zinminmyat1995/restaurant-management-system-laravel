<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('shop_code',255);
            $table->integer('menu_id');
            $table->string('menu_name',255);
            $table->string('menu_category_id',255); //menu_category => Indian food,Myanmar food,etc
            $table->integer('menu_type_id'); //menu_type=>Boiled,drink,etc 
            $table->integer('meat_type_id'); //chicken,fish,etc
            $table->integer('price');
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
        Schema::dropIfExists('menus');
    }
}
