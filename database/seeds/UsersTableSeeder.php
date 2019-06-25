<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // usuario con el rol editor
        $lector = User::create([
          'name' => 'lector',
          'last_name' => 'c',
          'email' => 'lector@gmail.com',
          'password' => '123456'
        ]);

        $lector->assignRole('lector');

        // usuario con el rol moderador
        $moderador = User::create([
          'name' => 'moderador',
          'last_name' => 'b',
          'email' => 'moderador@gmail.com',
          'password' => '123456'
        ]);

        $moderador->assignRole('moderador');

        // usuario con el rol super-admin
        $admin = User::create([
          'name' => 'admin',
          'last_name' => 'a',
          'email' => 'admin@gmail.com',
          'password' => '123456'
        ]);

        $admin->assignRole('super-admin');
    }
}
