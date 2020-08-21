<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIconsTable extends Migration
{
    public function up()
    {
        Schema::create('icons', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('icon_set_id');
            $table->string('name');
            $table->string('keywords');
            $table->boolean('outlined');
        });
    }
}
