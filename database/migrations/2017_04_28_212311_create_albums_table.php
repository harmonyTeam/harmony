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
       // 앨범에는 앨범번호, 사용자 id, 앨범제목, 게시글번호, 앨범사진, 앨범소개
        Schema::create('albums', function (Blueprint $table) {
            $table->integer('album_number');
            $table->string('user_id');
            $table->string('album_title');
            $table->string('album_picture');
            $table->string('album_content');
            // 외부에서 가져올 게시물정보.. 임시로 주석처리해둠..
            // $table->integer('write_number')->unsigned()->index(); // 외래키
            // $table->foreign('write_number')->references('music_number')
            //       ->on('musicboards')->onUpdate('cascade')
            //       ->onDelete('cascade');
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
