<?php

use Illuminate\Database\Seeder;

class CuposBecasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cupos_becas')->delete();
        
        \DB::table('cupos_becas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'estudiante_id' => 1,
                'type_beca_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}