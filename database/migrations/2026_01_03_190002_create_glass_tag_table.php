<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('glass_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('glass_id')->constrained('glasses')->onDelete('cascade');
            $table->foreignId('tag_id')->constrained('tags')->onDelete('cascade');
            $table->timestamps();

            $table->unique(['glass_id', 'tag_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('glass_tag');
    }
};
