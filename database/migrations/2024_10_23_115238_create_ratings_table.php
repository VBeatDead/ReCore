<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('item_id')->nullable()->constrained('newsgame');
            $table->integer('rating');
            $table->text('review');
            $table->string('category');
            $table->string('tags')->nullable();
            $table->string('status');
            $table->string('badge');
            $table->integer('point_reward');
            $table->timestamps();

            // Ensure one rating per user per news item
            $table->unique(['user_id', 'item_id']);
        });

        // Add points column to users table if it doesn't exist
        if (!Schema::hasColumn('users', 'points')) {
            Schema::table('users', function (Blueprint $table) {
                $table->integer('points')->default(0);
            });
        }
    }

    public function down()
    {
        if (Schema::hasColumn('users', 'points')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('points');
            });
        }

        Schema::dropIfExists('ratings');
    }
};
