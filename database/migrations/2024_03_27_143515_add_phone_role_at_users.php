<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // add Phone Column
            $table->string('phone')->nullable();
            // Add Role enum('admin','dokter','user') default is user
            $table->enum('role', ['admin', 'dokter', 'user'])->default('user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Remove Phone Column
            $table->dropColumn('phone');
            $table->dropColumn('role');
        });
    }
};
