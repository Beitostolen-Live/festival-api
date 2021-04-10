<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCompany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigInteger('orgno')->primary();
            $table->bigInteger('companyCategoryCodeSetId')->notNullable();
            $table->string('companyCategoryCodeId')->notNullable();
            $table->string('name')->notNullable();
            $table->bigInteger('orgformCodeSetId')->notNullable();
            $table->string('orgformCodeId')->notNullable();
            $table->unsignedBigInteger('postalAddress_id')->notNullable();
            $table->foreign('postalAddress_id')->references('id')->on('addresses');
            $table->unsignedBigInteger('businessAddress_id')->notNullable();
            $table->foreign('businessAddress_id')->references('id')->on('addresses');
            $table->softDeletesTz($column = 'deleted_at', $precision = 0);
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
        Schema::dropIfExists('companies');
    }
}
