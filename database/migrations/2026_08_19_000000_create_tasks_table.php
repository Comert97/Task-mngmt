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
        Schema::create('tasks', function (Blueprint $table) {
    
    $table->id();      
    $table->unsignedBigInteger('user_id'); // link to users
    $table->string('title');
    $table->text('description')->nullable();
    $table->enum('priority', ['easy','medium','hard']);
    $table->date('start_date');
    $table->date('end_date');
    $table->enum('status', ['not_started','in_progress','completed'])->default('not_started');
    $table->timestamps();

    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
