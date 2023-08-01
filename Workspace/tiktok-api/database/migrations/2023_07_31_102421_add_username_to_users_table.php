<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsernameToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function($table) {
            $table->string('username');
        });
    }

    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('username');
        });
    }
}
