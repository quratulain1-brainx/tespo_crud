<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('account_id')->index('users_account_id_foreign');
            $table->char('cognito_user_id', 36)->nullable();
            $table->char('nirvana_id', 36)->nullable();
            $table->string('email')->unique();
            $table->string('given_name')->nullable();
            $table->string('family_name')->nullable();
            $table->enum('sex', ['m', 'f', 'nb', 'u'])->default('u');
            $table->string('title')->nullable();
            $table->text('about')->nullable();
            $table->string('phone_number')->nullable();
            $table->date('dob')->nullable();
            $table->double('height', 8, 2)->default(0.00);
            $table->string('picture')->nullable();
            $table->string('tz')->default('utc');
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
        Schema::dropIfExists('users');
    }
}
