<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('free_test_master', function (Blueprint $table) {
            $table->id();
            $table->string('test_name');
            $table->string('url_name')->unique();
            $table->unsignedBigInteger('test_category');
            $table->integer('is_active')->default(0);
            $table->timestamps();
           
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tests');
    }
};

