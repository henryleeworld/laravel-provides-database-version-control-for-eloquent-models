<?php

use Redsnapper\LaravelVersionControl\Database\Migration;
use Redsnapper\LaravelVersionControl\Database\Blueprint;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->makeVcTables("users",function(Blueprint $table){
            $table->string('email')->unique();
            $table->string('name');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
        },function(Blueprint $table){
            $table->string('email');
            $table->string('name');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->dropVcTables('users');
    }
};
