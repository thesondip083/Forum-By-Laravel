<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
         'name'=>'SP singh',
         'email'=>'spsingh@gmail.com',
         'password'=>bcrypt('sondip'),
         'avatar'=>asset('/avatars/admin.png'),
         // 'avatar'=>'/uploads/avatars/admin.png',
         'admin'=>1,
        ]);
    }
}
