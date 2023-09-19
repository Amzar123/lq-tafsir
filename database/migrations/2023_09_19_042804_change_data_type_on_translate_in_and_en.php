<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDataTypeOnTranslateInAndEn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ayahs', function (Blueprint $table) {
            //
            $table->text('content')->change();
            $table->text('translate_in')->change();
            $table->text('translate_en')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ayahs', function (Blueprint $table) {
            //
        });
    }
}
