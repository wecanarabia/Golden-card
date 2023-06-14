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
        Schema::table('services', function (Blueprint $table) {
            $table->string('ipan')->after('role_id')->nullable();
            $table->string('location')->after('ipan')->nullable();
            $table->double('lat')->after('location')->nullable();
            $table->double('long')->after('lat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('ipan');
            $table->dropColumn('location');
            $table->dropColumn('lat');
            $table->dropColumn('long');
        });
    }
};
