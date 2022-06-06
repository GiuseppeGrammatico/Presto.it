<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Motori'
            ],
            [
                'name' => 'Sport'
            ],
            [
                'name' => 'Elettronica'
            ],
            [
                'name' => 'Immobili'
            ],
            [
                'name' => 'Abbigliamento'
            ],
            [
                'name' => 'Libri'
            ],
            [
                'name' => 'Giochi'
            ],
            [
                'name' => 'Servizi'
            ],
            [
                'name' => 'Arredamento'
            ],
            [
                'name' => 'Giardinaggio'
            ],
        ];
        
        foreach($categories as $category){
            DB::table('categories')->insert([
                'name' => $category['name'] 
            ]);
        }
    }
}
