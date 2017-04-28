<?php

use Illuminate\Database\Seeder;

class MusicBoardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      App\Musicboard::create([
        'file_name'   => 'sing1',
        'user_id'     => '1',
        'good_count'  => '3',
        'hits'        => '12',
      ]);
      App\Musicboard::create([
        'file_name'   => 'sing2',
        'user_id'     => '1',
        'good_count'  => '5',
        'hits'        => '8',
      ]);
      App\Musicboard::create([
        'file_name'   => 'sing3',
        'user_id'     => '1',
        'good_count'  => '4',
        'hits'        => '7',
      ]);
      App\Musicboard::create([
        'file_name'   => 'sing4',
        'user_id'     => '1',
        'good_count'  => '23',
        'hits'        => '510',
      ]);
      App\Musicboard::create([
        'file_name'   => 'sing5',
        'user_id'     => '1',
        'good_count'  => '39',
        'hits'        => '540',
      ]);
      App\Musicboard::create([
        'file_name'   => 'sing6',
        'user_id'     => '2',
        'good_count'  => '14',
        'hits'        => '152',
      ]);
      App\Musicboard::create([
        'file_name'   => 'sing7',
        'user_id'     => '2',
        'good_count'  => '31',
        'hits'        => '523',
      ]);
      App\Musicboard::create([
        'file_name'   => 'sing8',
        'user_id'     => '2',
        'good_count'  => '23',
        'hits'        => '310',
      ]);
    }
}
