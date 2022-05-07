<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrationBarriersToHouseDevices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('barriers', 'house_devices');
        Schema::table('house_devices', function (Blueprint $table) {
            $table->enum('type', ['barrier', 'door']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('house_devices', 'barriers');
        Schema::table('house_devices', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
}
