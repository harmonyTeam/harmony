<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       // 앨범에는 앨범번호, 사용자 id, 앨범제목, 게시글번호
        Schema::create('albums', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('album_title');
            $table->integer('write_number')->unsigned()->index(); // 외래키
            $table->foreign('write_number')->references('music_number')
                  ->on('musicboards')->onUpdate('cascade')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('albums');
    }
}
