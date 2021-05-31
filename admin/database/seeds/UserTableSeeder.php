// app/database/seeds/UserTableSeeder.php

<?php
use App\User;
use Illuminate\Database\Seeder;
class UserTableSeeder extends Seeder
{

public function run()
{
    DB::table('users')->delete();
    User::create(array(
        'name'     => 'admin',
        'email'    => 'admin@gmail.com',
        'password' => Hash::make('admin05!'),
    ));
}

}