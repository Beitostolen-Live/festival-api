<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class User extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->string('subject');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->softDeletes($column = 'deleted_at', $precision = 0);
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('role');
            $table->timestamps();
            $table->primary('subject');
            $table->unique('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user');
    }
}
