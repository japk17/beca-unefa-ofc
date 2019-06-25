<?php

use Illuminate\Database\Seeder;

class EstudiantesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('estudiantes')->delete();
        
        \DB::table('estudiantes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Luis Eduardo',
                'apellido' => 'Blanco Ramos',
                'cedula' => 12345678,
                'fecha_nacimiento' => '2011-01-03',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'jose luis',
                'apellido' => 'rodriguez perez',
                'cedula' => 78954621,
                'fecha_nacimiento' => '1999-02-21',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}