<?php

use App\Models\Sermon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;

class ModifySermonsTableAddScheduledDatetime extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sermons', function (Blueprint $table) {
            $table->datetime('scheduled_datetime')
                ->after('scheduled_time')
                ->storedAs("TIMESTAMP(CONCAT(`publish_date`, ' ', `scheduled_time`))")
                ->nullable();
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
            $table->dropColumn('scheduled_datetime');
        });
    }
}
