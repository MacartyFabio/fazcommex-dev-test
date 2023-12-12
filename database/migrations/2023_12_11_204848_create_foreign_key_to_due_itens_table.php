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
        Schema::table('due_itens', function (Blueprint $table) {
            $table->integer('due_id',false,true )->after('item');
            $table->foreign('due_id')
                ->references('id')
                ->on('dues');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('due_itens', function (Blueprint $table) {
            $table->dropForeign('due_id');
            $table->dropColumn('due_id');
        });
    }
};
