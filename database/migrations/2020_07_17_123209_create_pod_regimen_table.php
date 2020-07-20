<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePodRegimenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pod_regimen', function (Blueprint $table) {
            $table->unsignedBigInteger('pod_id')->index('pod_regimen_pod_id_foreign');
            $table->unsignedBigInteger('regimen_id')->index('pod_regimen_regimen_id_foreign');
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
        Schema::dropIfExists('pod_regimen');
    }
}
