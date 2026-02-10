<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('changelog_items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('changelog_version_id')->constrained()->cascadeOnDelete();
            $table->enum('type', ['added', 'changed', 'fixed', 'removed']);
            $table->json('description');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('changelog_items');
    }
};
