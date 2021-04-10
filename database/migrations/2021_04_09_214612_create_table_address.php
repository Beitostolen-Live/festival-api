<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('countryCodeSetId')->notNullable();
            $table->string('countryCodeId')->notNullable();
            $table->bigInteger('postalCodeSetId')->notNullable();
            $table->string('postalCodeId')->notNullable();
            $table->string('address1')->notNullable();
            $table->string('address2');
            $table->bigInteger('muncipalityCodeSetId')->notNullable();
            $table->string('muncipalityCodeId')->notNullable();
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
        Schema::dropIfExists('addresses');
    }
}
