<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('changelog_versions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('version', 50);
            $table->json('title');
            $table->date('release_date');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('changelog_versions');
    }
};
