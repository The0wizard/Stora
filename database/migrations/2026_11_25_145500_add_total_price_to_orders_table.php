<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('orders', 'total_price')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->decimal('total_price', 10, 2)->default(0);
            });
        }
    }

    public function down(): void
    {
        // Keep the column: up() may have detected a pre-existing total_price column.
    }
};
