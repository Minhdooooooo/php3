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
        if (Schema::hasTable('loaitin')) {
            return;
        }

        Schema::create('loaitin', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tenLoai', 120);
            $table->string('slug', 150)->nullable()->unique('uq_loaitin_slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loaitin');
    }
};
