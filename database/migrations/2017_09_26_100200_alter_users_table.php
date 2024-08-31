<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
            $table->index('department_id');
            $table->foreign('department_id')->references('id')->on('m_departments');

            $table->index('jabatan_id');
            $table->foreign('jabatan_id')->references('id')->on('m_jabatans');
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
            $table->dropForeign(['department_id']);
            $table->dropIndex(['department_id']);
            
            $table->dropForeign(['jabatan_id']);
            $table->dropIndex(['jabatan_id']);
        });
    }
}
