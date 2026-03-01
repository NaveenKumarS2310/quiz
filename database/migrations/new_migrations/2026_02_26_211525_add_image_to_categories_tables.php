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
        $tables = [
            'quiz_categories',
            'interview_categories',
            'job_categories',
            'news_categories',
            'notes_categories',
            'document_categories',
        ];

        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->string('category_image')->nullable()->after('category_name');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tables = [
            'quiz_categories',
            'interview_categories',
            'job_categories',
            'news_categories',
            'notes_categories',
            'document_categories',
        ];

        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->dropColumn('category_image');
            });
        }
    }
};
