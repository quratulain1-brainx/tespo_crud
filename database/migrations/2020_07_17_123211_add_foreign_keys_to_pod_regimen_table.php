<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPodRegimenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pod_regimen', function (Blueprint $table) {
            $table->foreign('pod_id')->references('id')->on('pods')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('regimen_id')->references('id')->on('regimens')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pod_regimen', function (Blueprint $table) {
            $table->dropForeign('pod_regimen_pod_id_foreign');
            $table->dropForeign('pod_regimen_regimen_id_foreign');
        });
    }
}
