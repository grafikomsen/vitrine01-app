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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('website_title');
            $table->text('description')->nullable();
            $table->string('keyword')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('image')->nullable();
            $table->text('url_canonique')->nullable();
            $table->text('url_googleSearchConsole')->nullable();
            $table->string('url_googleMaps')->nullable();
            $table->string('url_tictok ')->nullable();
            $table->string('url_facebook')->nullable();
            $table->string('url_twintter')->nullable();
            $table->string('url_instagram')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
