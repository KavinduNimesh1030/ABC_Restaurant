<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropForeign(['restaurant_id']);
            $table->dropForeign(['service_id']);
            $table->dropColumn('restaurant_id');
            $table->dropColumn('service_id');
            $table->string('type');
        });
    }
    
    public function down(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->unsignedBigInteger('restaurant_id');
            $table->unsignedBigInteger('service_id');
            $table->dropColumn('type');
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
            $table->foreign('service_id')->references('id')->on('services');
        });
    }
    
};
