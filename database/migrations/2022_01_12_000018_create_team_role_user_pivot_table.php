<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamRoleUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('team_role_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_5780714')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('team_role_id');
            $table->foreign('team_role_id', 'team_role_id_fk_5780714')->references('id')->on('team_roles')->onDelete('cascade');
        });
    }
}
