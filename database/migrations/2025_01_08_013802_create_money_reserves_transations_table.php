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
        /*  Arrumar o nome: transactions*/
        Schema::create('money_reserves_transations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->double('value');
            $table->enum('action', ['input', 'output']);

            /* relacionamento com a tabela users */
            /*          
            USAREI O INDIRETO!
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            */

            /* relacionamento com a tabela money_reserve_transactions */
            $table->unsignedBigInteger('money_reserve_id');
            $table
                ->foreign('money_reserve_id')
                ->references('id')
                ->on('money_reserves')
                ->onDelete('cascade');

            /* relacionamento com a tabela categories */
            $table->unsignedBigInteger('category_id');
            $table
                ->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('money_reserves_transations');
    }
};
