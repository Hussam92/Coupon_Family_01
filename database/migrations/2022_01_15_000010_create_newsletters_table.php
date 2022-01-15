<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewslettersTable extends Migration
{
    public function up()
    {
        Schema::create('newsletters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('planned_at')->nullable();
            $table->string('title');
            $table->boolean('is_global_list')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
