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
            'Mud Blocks',
            'Burnt Bricks',
            'Concrete Wall',
            'Cement Brocks',
            'Stones Masonry',
            'Timber',
            'Wooden',


        ])->each(function ($elevation){
            Elevation::firstOrCreate(['elevation_name'=>$elevation]);
        });
    }
}
