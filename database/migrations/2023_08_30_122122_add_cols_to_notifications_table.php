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
        Schema::table('notifications', function (Blueprint $table) {
            $table->enum('sending_times',['One Time','Multible Times'])->after('sent');
            $table->integer('number_of_times')->after('sending_times')->default(1);
            $table->integer('scheduale_time')->after('number_of_times')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->dropColumn('number_of_times');
            $table->dropColumn('number_of_times');
            $table->dropColumn('scheduale_time');
        });
    }
};
