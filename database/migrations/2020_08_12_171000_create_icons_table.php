<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('icons', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('icon_set_id');
            $table->string('name');
            $table->json('keywords');
            $table->boolean('outlined');
        });
    }
};
