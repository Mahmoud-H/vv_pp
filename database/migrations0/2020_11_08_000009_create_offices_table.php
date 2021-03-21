<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficesTable extends Migration
{
    public function up()
    {
        Schema::create('offices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('office_name');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
