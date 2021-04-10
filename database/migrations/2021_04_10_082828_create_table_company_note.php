<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCompanyNote extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companynote', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('noteCodeSetId')->notNullable();
            $table->string('noteCodeId')->notNullable();
            $table->mediumText('note')->notNullable();
            $table->bigInteger('company_orgno')->notNullable();
            $table->foreign('company_orgno')->references('orgno')->on('companies');
            $table->unsignedBigInteger('companycrew_id')->notNullable();
            $table->foreign('companycrew_id')->references('id')->on('companycrew');
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
        Schema::dropIfExists('companynote');
    }
}
