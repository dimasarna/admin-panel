<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_id')
                  ->onDelete('cascade');
            $table->foreignId('user_id')
                  ->onDelete('cascade');
            $table->integer('grade');
            $table->foreignId('group_id')
                  ->onDelete('cascade');
            $table->timestamps();
            $table->unique(['group_id', 'quiz_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quiz_user');
    }
};
