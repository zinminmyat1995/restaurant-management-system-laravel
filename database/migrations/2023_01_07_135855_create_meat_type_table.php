<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeatTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meat_type', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->softDeletes('deleted_at');
            $table->string('created_emp');
            $table->string('updated_emp');
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
        Schema::dropIfExists('meat_type');
    }
}
