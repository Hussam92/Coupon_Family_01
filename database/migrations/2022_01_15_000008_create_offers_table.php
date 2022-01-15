<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->boolean('is_active')->default(0);
            $table->datetime('expired_at')->nullable();
            $table->integer('duration_days');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
