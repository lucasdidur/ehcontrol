<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => "Teste",
            'last_name' => "User",
            'email' => 'teste@teste.com',
            'password' => bcrypt('teste'),
            'username_minecraft' => 'teste_user',
            'phone' => '42 99999-9999',
        ]);
    }
}