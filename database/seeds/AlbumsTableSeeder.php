<?php

use Illuminate\Database\Seeder;

class AlbumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      App\Album::create([
        'user_id'         => 'jin03192',
        'album_title'     => 'TOTO',
        'album_picture'   => 'test.jpg',
        'album_content'   => 'yaho',
      ]);
      App\Album::create([
        'user_id'         => 'jin03192',
        'album_title'     => 'CODE',
        'album_picture'   => 'test2.jpg',
        'album_content'   => 'MUNGO',
      ]);
      App\Album::create([
        'user_id'         => 'jin03192',
        'album_title'     => 'MAX',
        'album_picture'   => 'test3.jpg',
        'album_content'   => 'BULUESCREEN',
      ]);
    }
}
