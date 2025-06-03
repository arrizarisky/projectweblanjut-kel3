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
        Schema::table('barangs', function (Blueprint $table) {
            $table->dropForeign(['supplier_id']);
            $table->unsignedBigInteger('supplier_id')->nullable()->change();
            $table->foreign('supplier_id')->references('id')->on('suppliers')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('barangs', function (Blueprint $table) {
            $table->dropForeign(['supplier_id']);
            $table->unsignedBigInteger('supplier_id')->nullable(false)->change();
            $table->foreign('supplier_id')->references('id')->on('suppliers')->cascadeOnDelete();
        });

    }
};
