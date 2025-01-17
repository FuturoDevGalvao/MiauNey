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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->double('value')->default(0); // Valor atual da fatura (compras realizadas)
            $table->double('limit'); // Valor fixo do teto da fatura
            $table->string('due_date', 5);
            $table->boolean('paid')->default(false);

            /* relacionamento com a tabela credit_cards */
            $table->unsignedBigInteger('credit_card_id');
            $table->foreign('credit_card_id')
                ->references('id')
                ->on('credit_cards')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
