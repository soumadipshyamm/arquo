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
        Schema::create('buses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('route_id')->index()->references('id')->on('routes')->after('id');
            $table->time("from_time")->default('00:00:00')->comment('Departure time');
            $table->time("to_time")->default('00:00:00')->comment('Arrival time');
            $table->tinyInteger('status')->default(1)->comment('0=>not-active, 1=>Active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buses');
    }
};
