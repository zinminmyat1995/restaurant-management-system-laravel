<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import_materials', function (Blueprint $table) {
            $table->id();
            $table->string('shop_code',255);
            $table->integer('material_id');
            $table->decimal('price');
            $table->integer('purchase_type_id');
            $table->integer('import_count');
            $table->decimal('total_price');
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
        Schema::dropIfExists('import_materials');
    }
}
