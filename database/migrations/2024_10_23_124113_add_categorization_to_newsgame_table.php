<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('newsgame', function (Blueprint $table) {
            $table->string('category')->after('name');  // Kategori berita
            $table->json('tags')->nullable()->after('category');  // Tags berita
            $table->enum('reading_level', ['beginner', 'intermediate', 'expert'])->after('tags');  // Level pembaca
        });
    }

    public function down()
    {
        Schema::table('newsgame', function (Blueprint $table) {
            $table->dropColumn(['category', 'tags', 'reading_level']);
        });
    }
};
