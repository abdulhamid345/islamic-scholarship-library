<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            // Add new columns
            $table->string('language')->nullable();
            $table->json('categories')->nullable();
            $table->integer('number_of_pages')->nullable();
            $table->integer('year_written')->nullable();

            $table->unsignedBigInteger('scholar_id')->nullable();
       
            $table->foreign('scholar_id')->references('id')->on('scholars')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn(['language', 'categories', 'number_of_pages', 'year_written']);
            $table->dropForeign(['scholar_id']);
            $table->dropColumn('scholar_id');
        });
    }
};
