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
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('client_id')->constrained()->onDelete('cascade');
        $table->string('folio')->nullable(); // Folio fiscal
        $table->date('date');
        $table->decimal('subtotal', 12, 2);
        $table->decimal('tax', 12, 2);
        $table->decimal('total', 12, 2);
        $table->string('status')->default('draft'); // draft, paid, canceled
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
