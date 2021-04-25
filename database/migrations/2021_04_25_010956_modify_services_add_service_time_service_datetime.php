<?php

use App\Models\Sermon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyServicesAddServiceTimeServiceDatetime extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->time('service_time')
                ->after('service_date')
                ->nullable();
            $table->datetime('service_datetime')
                ->after('service_time')
                ->storedAs("TIMESTAMP(CONCAT(`service_date`, ' ', `service_time`))")
                ->nullable();
        });

        Sermon::all()
            ->each(function ($sermon) {
                $sermon->service()->update([
                    'service_time' => $sermon->scheduled_time,
                ]);
            });

        Schema::table('sermons', function (Blueprint $table) {
            $table->string('scheduled_time')->nullable()->change();
            $table->date('publish_date')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['service_datetime', 'service_time']);
        });
    }
}
