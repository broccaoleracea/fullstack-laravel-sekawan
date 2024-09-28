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
        Schema::create('library-users', function (Blueprint $table) {
            $table->uuid('library-user_id')->primary();
            $table->string('library-user_firstname', 150);
            $table->string('library-user_lastname', 150);
            $table->string('library-user_username', 150);
            $table->string('library-user_email', 150)->nullable(true);
            $table->string('library-user_password', 150);
            $table->boolean('library-user_isadmin')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('library-users');
    }
};
