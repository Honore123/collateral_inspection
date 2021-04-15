<?php

use Illuminate\Database\Seeder;
use App\Models\PropertyType;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            'Vacant Land',
            'Land other improvement',
            'Land with Building'
        ])->each(function ($type){
            PropertyType::firstOrCreate(['name'=>$type]);
        });
    }
}
