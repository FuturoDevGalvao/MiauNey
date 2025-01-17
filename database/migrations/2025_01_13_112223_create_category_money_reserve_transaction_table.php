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
        Schema::create('category_money_reserves_transaction', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('money_reserves_transaction_id');

            // Relacionamento com a tabela categories
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade')
                ->name('cat_mrts_fk'); // Nome mais curto para a constraint

            // Relacionamento com a tabela money_reserve_transactions
            $table->foreign('money_reserves_transaction_id')
                ->references('id')
                ->on('money_reserves_transactions')
                ->onDelete('cascade')
                ->name('mrts_cat_fk'); // Nome mais curto para a constraint

            // Define a chave composta como PK
            $table->primary(['category_id', 'money_reserves_transaction_id']);

            // Timestamps opcionais
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_money_reserve_transaction');
    }
};
