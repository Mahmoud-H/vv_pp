<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositTypesTable extends Migration
{
    public function up()
    {
        Schema::create('deposit_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('deposit_type_desc');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
