<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // kolom id auto increment
            $table->string('product_name', 255);
            $table->string('unit', 50);
            $table->string('type', 50);
            $table->string('information', 233)->nullable();
            $table->smallInteger('qty')->nullable();
            $table->string('producer', 255)->nullable();
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Rollback migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
