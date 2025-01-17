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
        Schema::create('money_reserves', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->double('goal');
            $table->double('amount_achieved')->default(0);
            $table->boolean('goal_achieved')->default(false);

            /* Campo para imagem */
            $table->string('image_path')->nullable(); // Caminho da imagem, pode ser nulo inicialmente.

            /* Relacionamento com a tabela users */
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('money_reserves');
    }
};
