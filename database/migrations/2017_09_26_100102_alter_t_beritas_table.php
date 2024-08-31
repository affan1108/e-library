<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTBeritasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('t_beritas', function($table) {
            $table->index('kategori_berita_id');
            $table->foreign('kategori_berita_id')->references('id')->on('m_kategori_beritas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('t_beritas', function($table) {
            $table->dropForeign(['kategori_berita_id']);
            $table->dropIndex(['kategori_berita_id']);
        });
    }
}
