<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUserRightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_rights', function($table) {
            $table->index('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->index('app_id');
            $table->foreign('app_id')->references('id')->on('apps');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_rights', function($table) {
            $table->dropForeign(['user_id']);
            $table->dropIndex(['user_id']);
            
            $table->dropForeign(['app_id']);
            $table->dropIndex(['app_id']);
        });
    }
}
