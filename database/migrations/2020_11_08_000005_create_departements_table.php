<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartementsTable extends Migration
{
    public function up()
    {
        Schema::create('departements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dept_name')->nullable();
            $table->boolean('is_active')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
