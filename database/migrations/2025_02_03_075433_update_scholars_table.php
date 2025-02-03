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
        Schema::table('scholars', function (Blueprint $table) {
            
            $table->dropColumn('students'); 
            $table->string('students')->nullable();

            
            $table->string('years_active')->nullable();
        });
    }

    public function down()
    {
        Schema::table('scholars', function (Blueprint $table) {
            $table->dropColumn('years_active'); 
            $table->dropColumn('students'); 
            $table->json('students')->nullable(); 
        });
    }
};
