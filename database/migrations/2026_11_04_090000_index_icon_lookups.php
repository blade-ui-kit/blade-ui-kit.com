<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('icons', function (Blueprint $table) {
            $table->index('name');
            $table->index('icon_set_id');
        });
    }

    public function down(): void
    {
        Schema::table('icons', function (Blueprint $table) {
            $table->dropIndex(['name']);
            $table->dropIndex(['icon_set_id']);
        });
    }
};
