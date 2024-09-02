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
        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign(['reservation_id']);
            $table->dropColumn('reservation_id');
            $table->string('resourceble_id');
            $table->string('resourceble_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->unsignedBigInteger('reservation_id');
            $table->dropColumn('resourceble_id');
            $table->dropColumn('resourceble_type');
            $table->foreign('reservation_id')->references('id')->on('reservations');
        });
    }
};
