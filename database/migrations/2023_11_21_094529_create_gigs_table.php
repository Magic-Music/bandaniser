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
        Schema::create('gigs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('venue_id')->constrained();
            $table->foreignId('agency_id')->nullable()->constrained();
            $table->foreignId('member_id')->constrained();
            $table->date('date');
            $table->time('arrival');
            $table->time('soundcheck_finish')->nullable();
            $table->time('sets')->nullable();
            $table->string('set_times')->nullable();
            $table->string('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gigs');
    }
};
