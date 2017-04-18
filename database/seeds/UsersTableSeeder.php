<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
          'user_id' => 'jin03192',
          // 'user_password' => bcrypt('password'),
          'user_pass' => '123123',
        ]);
    }
}
