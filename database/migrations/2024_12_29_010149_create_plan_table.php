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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('storage_limit');
            $table->integer('bandwidth_limit');
            $table->integer('ram_limit');
            $table->boolean('is_public')->default(false);
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('plan_pricing', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plan_id');
            $table->foreign('plan_id')->references('id')->on('plans');
            $table->timestamps();
            $table->enum('billing_cycle', ['monthly', 'yearly']);
            $table->float('price',2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan');
        Schema::dropIfExists('plan_pricing,');
    }
};
