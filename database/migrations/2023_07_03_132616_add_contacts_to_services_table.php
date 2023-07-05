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
            $table->string('first_contact')->nullable()->after('ipan');
            $table->string('second_contact')->nullable()->after('first_contact');
            $table->double('profit_margin')->default(0)->after('second_contact');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('first_contact');
            $table->dropColumn('second_contact');
            $table->dropColumn('profit_margin');
        });
    }
};
