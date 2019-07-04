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
         $this->call(RolesAndPermissions::class);
        $this->call(EstudiantesTableSeeder::class);
        $this->call(TypeBecasTableSeeder::class);
        $this->call(CuposBecasTableSeeder::class);
        $this->call(UsersTableSeeder::class);

    }
}
