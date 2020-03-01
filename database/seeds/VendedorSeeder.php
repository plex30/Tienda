<?php

use Illuminate\Database\Seeder;
use App\Vendedor;
class VendedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('vendedors')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Vendedor::create([
            'nombre' => 'Pedro Gomez',
            'telefono' => '666777555',
            'direccion'=> 'C/Guadix 4D Almeria',
            'mail'=>'pedro@gmail.com'
        ]);

        Vendedor::create([
            'nombre' => 'Alba Perez',
            'telefono' => '656757555',
            'direccion'=> 'C/Mendez 9H Almeria',
            'mail'=>'alba@gmail.com'
        ]);

        Vendedor::create([
            'nombre' => 'Juan Lopez',
            'telefono' => '644535244',
            'direccion'=> 'C/Ruano 8D Almeria',
            'mail'=>'juan@gmail.com'
        ]);
    }
}
