<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->foreign('account_id')->references('id')->on('accounts')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('action_id')->references('id')->on('actions')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('pod_id')->references('id')->on('pods')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('regimen_id')->references('id')->on('regimens')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->dropForeign('schedules_account_id_foreign');
            $table->dropForeign('schedules_action_id_foreign');
            $table->dropForeign('schedules_pod_id_foreign');
            $table->dropForeign('schedules_regimen_id_foreign');
            $table->dropForeign('schedules_user_id_foreign');
        });
    }
}
