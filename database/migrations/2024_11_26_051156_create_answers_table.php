<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('answers', function (Blueprint $table) {
        $table->id();
        $table->text('content');
        $table->foreignId('question_id')->constrained()->onDelete('cascade'); // Links to questions table
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Links to users table
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};
