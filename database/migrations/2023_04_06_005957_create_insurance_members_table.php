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
        Schema::create('insurance_members', function (Blueprint $table) {
            $table->id();
            $table->string('member_id')->nullable();
            $table->string('name')->nullable();
            $table->string('cluster')->nullable();
            $table->string('gender')->nullable();
            $table->date('birthday')->nullable();
            $table->string('age')->nullable();
            $table->string('tin_1')->nullable();
            $table->string('tin_2')->nullable();
            $table->string('tin_3')->nullable();
            $table->date('date_of_death')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurance_members');
    }
};
