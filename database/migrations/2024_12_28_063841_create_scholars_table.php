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
        Schema::create('scholars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('about')->nullable();
            $table->longText('biography')->nullable();
            $table->json('published_works')->nullable();
            $table->json('students')->nullable();
            $table->json('categories')->nullable(); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('scholars');
    }
};
