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
        Schema::create('cohorts', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('title');
            $table->integer('product_id');
            $table->integer('user_id');
            $table->dateTime('enroll_start')->default(now());
            $table->dateTime('enroll_end');
            $table->dateTime('start_date');
            $table->integer('discount')->default(0);
            $table->enum('pioneer', ['yes', 'no'])->default('no');
            $table->dateTime('end_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cohorts');
    }
};
