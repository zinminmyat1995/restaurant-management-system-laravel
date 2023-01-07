<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->string('shop_code');
            $table->string('employee_id');
            $table->string('employee_name');
            $table->string('password');
            $table->timestamp('date_of_birth');
            $table->string('gender');
            $table->integer('phone_number');
            $table->string('address');
            $table->integer('role');
            $table->timestamp('deleted_at')->useCurrent();
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
        Schema::dropIfExists('employee');
    }
}
