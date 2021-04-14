<?php

use Illuminate\Database\Seeder;
use App\Models\Roof;

class RoofSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            'In simple sheet metal on wood',
            'In strong sheet metal on wood',
            'In strong sheet metal on beam',
            'strong sheet metal on metallic framework',
            'Metallic gutter',
            'Planche de rive en bois'

        ])->each(function ($roof){
            Roof::firstOrCreate(["roof_name"=>$roof]);
        });
    }
}
