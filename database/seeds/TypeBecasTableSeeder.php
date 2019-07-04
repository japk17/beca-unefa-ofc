<?php

use Illuminate\Database\Seeder;

class TypeBecasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('type_becas')->delete();
        
        \DB::table('type_becas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Ayudante Administrativo',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Preparador',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}