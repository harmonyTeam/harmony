<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMusicboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('musicboards', function (Blueprint $table) {
            // 게시번호(기본키), 파일명, 사용자번호, 추천수, 조회수, 작성날짜

            $table->increments('music_number');
            $table->string('file_name');
            // user_id는 users 테이블의 'id'를 참조하여 불러야 할 듯 함.
            $table->integer('user_id')->unsigned()->index();
            $table->integer('good_count');
            $table->integer('hits');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')
                  ->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('musicboards');
    }
}
