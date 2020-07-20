<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('account_id')->nullable()->index('schedules_account_id_foreign');
            $table->unsignedBigInteger('user_id')->nullable()->index('schedules_user_id_foreign');
            $table->unsignedBigInteger('regimen_id')->nullable()->index('schedules_regimen_id_foreign');
            $table->unsignedBigInteger('pod_id')->nullable()->index('schedules_pod_id_foreign');
            $table->enum('type', ['reminder', 'notification'])->default('reminder');
            $table->string('title')->nullable();
            $table->string('body');
            $table->unsignedBigInteger('action_id')->nullable()->index('schedules_action_id_foreign');
            $table->unsignedInteger('repeat')->default(1);
            $table->enum('interval', ['day', 'week', 'month', 'year'])->default('day');
            $table->longText('weekday')->nullable();
            $table->longText('day')->nullable();
            $table->time('time')->default('08:00:00');
            $table->unsignedInteger('num')->default(0);
            $table->date('end_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
