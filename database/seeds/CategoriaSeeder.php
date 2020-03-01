<?php

use Illuminate\Database\Seeder;
use App\Categoria;
class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('categorias')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Categoria::create([
            'nombre' => 'Hogar',
            'descripcion' => 'Categoria destinada a productos del hogar'
        ]);

        Categoria::create([
            'nombre' => 'Electronica',
            'descripcion' => 'Categoria destinada a productos electronicos'
        ]);

        Categoria::create([
            'nombre' => 'Bazar',
            'descripcion' => 'Categoria destinada a productos de bazar'
        ]);
    }
}
