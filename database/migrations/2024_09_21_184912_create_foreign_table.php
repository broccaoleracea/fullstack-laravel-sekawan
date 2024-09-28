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
        Schema::create('books', function (Blueprint $table) {
            $table->uuid('book_id')->primary();
            $table->uuid('book_category_id');
            $table->uuid('book_publisher_id');
            $table->uuid('book_shelf_id');
            $table->uuid('book_author_id');
            $table->string('book_name', 255);
            $table->char('book_isbn', 16);
            $table->integer('book_stock');
            $table->string('book_desc', 255);
            $table->string('book_img', 255);
            $table->timestamps();
            
            //Add foreign key constraint
            $table->foreign('book_category_id')->references('category_id')->on('categories');
            $table->foreign('book_publisher_id')->references('publisher_id')->on('publishers');
            $table->foreign('book_shelf_id')->references('shelf_id')->on('shelfs');
            $table->foreign('book_author_id')->references('author_id')->on('authors');
        });

        Schema::create('borrowings', function (Blueprint $table) {
            $table->uuid('borrowing_id')->primary();
            $table->uuid('borrowing_user_id');
            $table->boolean('borrowing_isreturned');
            $table->text('borrowing_notes')->nullable(true);
            $table->integer('borrowing_fine')->nullable(true);
            $table->timestamps();

            $table->foreign('borrowing_user_id')->references('library-user_id')->on('library-users');
        });

        
        Schema::create('borrowing_details', function (Blueprint $table) {
            $table->uuid('detail_id')->primary();
            $table->uuid('detail_book_id');
            $table->uuid('detail_borrowing_id');
            $table->integer('detail_qty');
            $table->timestamps();

            $table->foreign('detail_book_id')->references('book_id')->on('books');
            $table->foreign('detail_borrowing_id')->references('borrowing_id')->on('borrowings');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
        Schema::dropIfExists('borrowings');
        Schema::dropIfExists('borrowing_details');
    }
};
