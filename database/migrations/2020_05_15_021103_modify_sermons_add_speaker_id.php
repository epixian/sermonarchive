<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifySermonsAddSpeakerId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sermons', function (Blueprint $table) {
            $table->bigInteger('speaker_id')->unsigned()->index()->before('name')->nullable();
            $table->foreign('speaker_id')->references('id')->on('speakers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sermons', function (Blueprint $table) {
            $table->dropForeign('sermons_speaker_id_foreign');
            $table->dropColumn('speaker_id');
        });
    }
}
