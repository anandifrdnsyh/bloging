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

        $user = App\User::create([
            'name' => 'mochanandi',
            'email' => 'anandi@gmail.com',
            'password' => bcrypt('anandi'),
            'admin' => 1,
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => '/uploads/avatars/1.png',
            'about' => 'coba coba coba coba coba coba coba coba coba coba coba coba',
            'facebook' => 'facebook.com',
        ]);
    }
}
