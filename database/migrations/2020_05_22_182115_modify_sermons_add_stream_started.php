<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifySermonsAddStreamStarted extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sermons', function (Blueprint $table) {
            $table->boolean('stream_started')->default(false);
            $table->boolean('stream_ended')->default(false);
            $table->boolean('recording_done')->default(false);
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
            $table->dropColumn('stream_started');
            $table->dropColumn('stream_ended');
            $table->dropColumn('recording_done');
        });
    }
}
