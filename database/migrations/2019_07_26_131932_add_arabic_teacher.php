<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddArabicTeacher extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('teacher', function (Blueprint $table) {
         $table->text('ar_title')->nullable();
                    $table->text('ar_description')->nullable();
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
           Schema::table('teacher', function(Blueprint $table) {
                     $table->dropColumn('ar_title');
                    $table->dropColumn('ar_description');
                });
    }
}
