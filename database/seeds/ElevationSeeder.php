<?php

use Illuminate\Database\Seeder;
use App\Models\Elevation;
class ElevationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            'RC  lintel',
            'RC floor',
            'RC ground beams',
            'RC columns',
            'Wall elevation in cob',
            'Dry bricks wall with land mortar',
            'Frames in Bricks wall with ciment mortar',
            'Bricks wall with land mortar(amatafari ahiye+Icyondo)',
            'Ciment bricks wall (buroki+sima)',
            'Ruliba bricks wall',
            'Claustra',

        ])->each(function ($elevation){
            Elevation::firstOrCreate(['elevation_name'=>$elevation]);
        });
    }
}
