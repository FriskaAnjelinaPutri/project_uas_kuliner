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
        Schema::rename('tempat_makans', 'friska_tempat_makans');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('friska_tempat_makans', 'tempat_makans');
    }
};
