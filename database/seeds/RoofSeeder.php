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
            'Clay Tiles',
            'Concrete Tiles',
            'Metal Sheets',


        ])->each(function ($roof){
            Roof::firstOrCreate(["roof_name"=>$roof]);
        });
    }
}
