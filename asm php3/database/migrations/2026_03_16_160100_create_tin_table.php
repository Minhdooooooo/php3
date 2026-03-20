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
        if (Schema::hasTable('tin')) {
            return;
        }

        Schema::create('tin', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idLT');
            $table->string('tieuDe', 255);
            $table->string('slug', 255)->nullable()->unique('uq_tin_slug');
            $table->text('tomTat')->nullable();
            $table->longText('noiDung')->nullable();
            $table->string('hinh', 255)->nullable();
            $table->dateTime('ngayDang');
            $table->unsignedInteger('xem')->default(0);
            $table->boolean('anHien')->default(1);
            $table->timestamps();

            $table->index(['idLT', 'ngayDang'], 'idx_tin_idlt_ngaydang');
            $table->index('xem', 'idx_tin_xem');
            $table->foreign('idLT', 'fk_tin_loaitin')
                ->references('id')
                ->on('loaitin')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tin');
    }
};
