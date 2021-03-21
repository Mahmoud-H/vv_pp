<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficeTeamPivotTable extends Migration
{
    public function up()
    {
        Schema::create('office_team', function (Blueprint $table) {
            $table->unsignedInteger('team_id');
            $table->foreign('team_id', 'team_id_fk_2552799')->references('id')->on('teams')->onDelete('cascade');
            $table->unsignedInteger('office_id');
            $table->foreign('office_id', 'office_id_fk_2552799')->references('id')->on('offices')->onDelete('cascade');
        });
    }
}
