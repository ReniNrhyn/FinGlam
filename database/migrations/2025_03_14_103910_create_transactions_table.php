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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi ke users
            $table->string('type'); // "income" atau "expense"
            $table->string('category'); // Gaji, hadiah, belanja, dll.
            $table->decimal('amount', 10, 2); // Jumlah uang
            $table->text('description')->nullable(); // Deskripsi transaksi
            $table->string('receipt')->nullable(); // Upload bukti transaksi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
