<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('role_id')->after('id');
            $table->string('first_name')->after('name');
            $table->string('last_name')->after('first_name');
            $table->string('phone')->after('email');
            $table->dateTime('deleted_at')->after('updated_at');
            // $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {
            $table->integer('role_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->dateTime('deleted_at');
        });
    }
}
