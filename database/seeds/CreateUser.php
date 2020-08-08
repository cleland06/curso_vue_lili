<?php

use Illuminate\Database\Seeder;
use App\User;
class CreateUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name     = "Coraline jhones";
        $user->email    = "coraline@hotmail.com";
        $user->password = bcrypt("123456");
        $user->save();
    }
}
