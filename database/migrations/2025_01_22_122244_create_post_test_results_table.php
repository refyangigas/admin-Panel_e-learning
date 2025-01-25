<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('post_test_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->decimal('score', 5, 2);
            $table->integer('total_questions');
            $table->integer('correct_answers');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('post_test_results');
    }
};
