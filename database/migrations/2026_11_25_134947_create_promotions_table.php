<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // ex: "Black Friday"
            $table->foreignId('book_id')->constrained()->onDelete('cascade');
            $table->enum('discount_type', ['percentage', 'fixed']); // % ou prix fixe
            $table->decimal('discount_value', 8, 2); // ex: 20.00 (pour 20% ou 20$)
            $table->dateTime('starts_at');
            $table->dateTime('ends_at');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
