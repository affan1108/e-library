<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterMDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('m_departments', function($table) {
            $table->index('area_kerja_id');
            $table->foreign('area_kerja_id')->references('id')->on('m_area_kerjas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('m_departments', function($table) {
            $table->dropForeign(['area_kerja_id']);
            $table->dropIndex(['area_kerja_id']);
        });
    }
}
