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
        Schema::create('queries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('restaurant_id');
            $table->text('query_text');
            $table->text('response_text')->nullable();
            $table->dateTime('query_date');
            $table->string('status')->default('Pending');
            $table->timestamps();
    
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('queries');
    }
    
};
