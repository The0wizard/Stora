<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('books', function (Blueprint $table) {
        $table->boolean('featured')->default(false);  // Add a boolean column for featured books
    });
}

public function down()
{
    Schema::table('books', function (Blueprint $table) {
        $table->dropColumn('featured');  // Remove the column if we roll back
    });
}

};
