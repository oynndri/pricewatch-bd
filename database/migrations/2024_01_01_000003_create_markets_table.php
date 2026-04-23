<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('markets', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('name_en', 100);
            $table->string('location', 100);
            $table->string('district', 100);
            $table->string('division', 50)->default('');
            $table->decimal('latitude', 10, 7)->default(0);
            $table->decimal('longitude', 10, 7)->default(0);
            $table->decimal('rating', 3, 1)->default(0);
            $table->boolean('verified')->default(false);
            $table->string('type', 20);
            $table->integer('total_prices')->default(0);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('markets');
    }
};
