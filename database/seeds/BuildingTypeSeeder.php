<?php

use Illuminate\Database\Seeder;
use App\Models\BuildingType;

class BuildingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            'Residential',
            'Commercial',
            'Special Property'
        ])->each(function ($building){
            BuildingType::firstOrCreate(['name'=>$building]);
        });
    }
}
