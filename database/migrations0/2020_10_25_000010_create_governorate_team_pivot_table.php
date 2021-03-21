<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGovernorateTeamPivotTable extends Migration
{
    public function up()
    {
        Schema::create('governorate_team', function (Blueprint $table) {
            $table->unsignedInteger('team_id');
            $table->foreign('team_id', 'team_id_fk_2467019')->references('id')->on('teams')->onDelete('cascade');
            $table->unsignedInteger('governorate_id');
            $table->foreign('governorate_id', 'governorate_id_fk_2467019')->references('id')->on('governorates')->onDelete('cascade');
        });
    }
}
