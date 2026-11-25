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
        $table->string('author')->after('title'); // Add author column after the title column
    });
}

public function down()
{
    Schema::table('books', function (Blueprint $table) {
        $table->dropColumn('author'); // Drop the column if rolling back
    });
}



};
