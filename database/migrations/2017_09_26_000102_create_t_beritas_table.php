<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTBeritasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_beritas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kategori_berita_id')->unsigned();
            $table->string('judul');
            $table->text('excerpt');
            $table->text('body');
            $table->string('featured_img')->nullable();
            $table->date('published_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('t_beritas');
    }
}
