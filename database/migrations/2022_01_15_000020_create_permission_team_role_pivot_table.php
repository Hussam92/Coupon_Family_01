<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionTeamRolePivotTable extends Migration
{
    public function up()
    {
        Schema::create('permission_team_role', function (Blueprint $table) {
            $table->unsignedBigInteger('team_role_id');
            $table->foreign('team_role_id', 'team_role_id_fk_5780669')->references('id')->on('team_roles')->onDelete('cascade');
            $table->unsignedBigInteger('permission_id');
            $table->foreign('permission_id', 'permission_id_fk_5780669')->references('id')->on('permissions')->onDelete('cascade');
        });
    }
}
