<?php

use Illuminate\Database\Seeder;
use App\Articulo;
class ArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('articulos')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Articulo::create([
            'nombre' => 'cuchillo',
            'precio' => '2',
            'stock' => '25',
            'categoria_id'=> '1'
        ]);

        Articulo::create([
            'nombre' => 'Altavoz',
            'precio' => '20',
            'stock' => '5',
            'categoria_id'=> '2'
        ]);

        Articulo::create([
            'nombre' => 'Monitor',
            'precio' => '42',
            'stock' => '2',
            'categoria_id'=> '2'
        ]);
    }
}
