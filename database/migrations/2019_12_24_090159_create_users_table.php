<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id')
            ->autoIncrement();
            $table->string('username',255);
            $table->string('mail',255)
            ->unique();
            $table->string('password',255)
            ->unique();
            $table->string('bio',400)->nullable();
            $table->string('images',255)->default('dawn.png')->nullable();
            $table->timestamp('created_at')
            ->useCurrent();
            $table->timestamp('updated_at')
            ->useCurrent()
            ->onUpdate('cascade');
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
