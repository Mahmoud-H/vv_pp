<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorsTable extends Migration
{
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('visitor_id_num');
            $table->string('visitor_name');
            $table->string('mobile_num')->nullable();
            $table->datetime('in_date_time')->nullable();
            $table->longText('deposit')->nullable();
            $table->string('notes')->nullable();
            $table->datetime('out_date_time')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
