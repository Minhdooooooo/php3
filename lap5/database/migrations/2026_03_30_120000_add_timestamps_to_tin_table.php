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
        if (!Schema::hasTable('tin')) {
            return;
        }

        $hasCreatedAt = Schema::hasColumn('tin', 'created_at');
        $hasUpdatedAt = Schema::hasColumn('tin', 'updated_at');

        if ($hasCreatedAt && $hasUpdatedAt) {
            return;
        }

        Schema::table('tin', function (Blueprint $table) use ($hasCreatedAt, $hasUpdatedAt) {
            if (!$hasCreatedAt && !$hasUpdatedAt) {
                $table->timestamps();
                return;
            }

            if (!$hasCreatedAt) {
                $table->timestamp('created_at')->nullable();
            }

            if (!$hasUpdatedAt) {
                $table->timestamp('updated_at')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (!Schema::hasTable('tin')) {
            return;
        }

        $hasCreatedAt = Schema::hasColumn('tin', 'created_at');
        $hasUpdatedAt = Schema::hasColumn('tin', 'updated_at');

        if (!$hasCreatedAt && !$hasUpdatedAt) {
            return;
        }

        Schema::table('tin', function (Blueprint $table) use ($hasCreatedAt, $hasUpdatedAt) {
            if ($hasCreatedAt) {
                $table->dropColumn('created_at');
            }

            if ($hasUpdatedAt) {
                $table->dropColumn('updated_at');
            }
        });
    }
};
