<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->string('city')->nullable();
            $table->string('phone')->nullable();
            $table->string('domain')->nullable();
            $table->string('email')->nullable();
            $table->string('street')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
