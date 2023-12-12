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
        Schema::create('due_itens', function (Blueprint $table) {
            $table->integer('id', true, true);
            $table->integer('item')->nullable(false);
            $table->char('nfe_chave', 44)->nullable(false);
            $table->char('nfe_numero', 9)->nullable(false);
            $table->char('nfe_serie', 3)->nullable(false);
            $table->char('nfe_item', 11)->nullable(false);
            $table->longText('descricao_complementar')->nullable(false);
            $table->char('ncm',8)->nullable(false);
            $table->decimal('vmle_moeda',17,2)->nullable()->default(null);
            $table->decimal('vmcv_moeda',17,2)->nullable()->default(null);
            $table->decimal('peso_liquido',17,5)->nullable()->default(null);
            $table->char('enquadramento1', 5)->nullable()->default(null);
            $table->char('enquadramento2', 5)->nullable()->default(null);
            $table->char('enquadramento3', 5)->nullable()->default(null);
            $table->char('enquadramento4', 5)->nullable()->default(null);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('due_itens');
    }
};
