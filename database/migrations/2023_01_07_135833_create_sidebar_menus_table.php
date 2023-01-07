<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSidebarMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sidebar_menus', function (Blueprint $table) {
            $table->id();
            $table->string('main_menu');
            $table->string('sub_menu');
            $table->integer('role');
            $table->string('controller');
            $table->string('method');
            $table->timestamp('deleted_at')->useCurrent();
            $table->timestamp('created_date')->useCurrent();
            $table->timestamp('updated_date')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sidebar_menus');
    }
}
