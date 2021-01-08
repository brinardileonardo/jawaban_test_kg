<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtikelTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_artikel', function (Blueprint $table) {
            $table->increments('artikel_id');
            $table->string('artikel_judul');
            $table->text('artikel_body');
            $table->integer('author_id');
            $table->timestamp('tanggal_publish');
            $table->string('path_image');
            $table->integer('status_publish');
            $table->integer('category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('tbl_artikel');
    }
}
