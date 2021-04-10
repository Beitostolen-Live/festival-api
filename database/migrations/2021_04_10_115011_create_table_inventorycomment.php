<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableInventorycomment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventorycomment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->mediumText('comment')->notNullable();
            $table->bigInteger('user_id')->notNullable();
            $table->unsignedBigInteger('inventory_id')->notNullable();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
            $table->timestamps();
            $table->foreign('inventory_id')->references('id')->on('inventory');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventorycomment');
    }
}
