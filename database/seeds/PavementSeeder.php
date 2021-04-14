<?php

use Illuminate\Database\Seeder;
use App\Models\Pavement;

class PavementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            'Under ornemental tiling in bricks regrout by ciment mortar',
            'Under ornemental tiling in bricks',
            'Under ornemental tiling in stones',
            'Underornemental in concrete',
            'Underornemental in reinforced concrete',
            'Screed lissee',
            'Screed talochee',
            'Ornemental tiling in tile',
            'Screed on foundation(chape en ciment)',
            'Pavement revetu de floorflex',
            'Ornemental in wood'

        ])->each(function($pavement){
            Pavement::firstOrCreate(["pavement_name"=>$pavement]);
        });
    }
}
