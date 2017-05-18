<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // if(config('database.default') !== 'mysql') {
      //   DB::statement('SET FOREIGN_KEY_CHECKS=0');
      // }


        // App\User::truncate();
        $this->call(UsersTableSeeder::class);
        // App\Musicboard::truncate();
        $this->call(AlbumsTableSeeder::class);
        $this->call(MusicBoardsTableSeeder::class);

        // if (config('database.default') !== 'mysql') {
        //   DB::statement('SET FOREIGN_KEY_CHECKS=1');
        // }

    }
}
