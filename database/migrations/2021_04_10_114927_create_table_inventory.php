<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableInventory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('inventoryCategoryCodeSetId')->notNullable();
            $table->string('inventoryCategoryCodeId')->notNullable();
            $table->string('name')->notNullable();
            $table->unsignedBigInteger('storagelocation_id')->notNullable();
            $table->text('description');
            $table->softDeletes($column = 'deleted_at', $precision = 0);
            $table->timestamps();
            $table->foreign('storagelocation_id')->references('id')->on('storagelocation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory');
    }
}
