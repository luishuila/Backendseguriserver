<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;
class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Categoria::create([
            'nombre'=>'Electrónica, Audio y Video',
            'slug'=>"Electrónica, Audio y Video",
            'descripcion'=>'Electrónica, Audio y Video'
         ]);
         Categoria::create([
            'nombre'=>'Celulares y Teléfonos',
            'slug'=>"Celulares y Teléfonos",
            'descripcion'=>'Celulares y Teléfonos'
         ]);
         Categoria::create([
            'nombre'=>'Computación',
            'slug'=>"Computación",
            'descripcion'=>'Computación'
         ]);
    }
}
