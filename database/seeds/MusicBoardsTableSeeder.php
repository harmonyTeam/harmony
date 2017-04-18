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
    }
}
