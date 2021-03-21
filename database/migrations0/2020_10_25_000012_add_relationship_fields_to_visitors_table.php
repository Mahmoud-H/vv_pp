<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToVisitorsTable extends Migration
{
    public function up()
    {
        Schema::table('visitors', function (Blueprint $table) {
            $table->unsignedInteger('dept_id')->nullable();
            $table->foreign('dept_id', 'dept_fk_2465272')->references('id')->on('departements');
            $table->unsignedInteger('governorate_id');
            $table->foreign('governorate_id', 'governorate_fk_2465280')->references('id')->on('governorates');
            $table->unsignedInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_2465314')->references('id')->on('teams');
        });
    }
}
