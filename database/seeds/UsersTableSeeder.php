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
        \eeducar\User::create([
            'name'=>'Wilder Machado da Cruz',
            'email'=>'wildermachadodacruz@gmail.com',
            'password'=>bcrypt('Verdade'),
            'role'=>'admin'
        ]);
    }
}
