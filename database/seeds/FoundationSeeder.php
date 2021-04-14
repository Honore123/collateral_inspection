<?php

use Illuminate\Database\Seeder;
use App\Models\Foundation;
class FoundationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            'Levelling',
            'Foundation excavation',
            'Ruble stones with ciment mortar',
            'Ruble stones with land mortar',
            'Foundation with dry bricks',
            'Retaining wall',
            'Foundation in concrete',
            'Foundation in reinforced concrete',
            'Screed on foundation(chape en ciment)',
            'Roofing'

        ])->each(function($foundation){
            Foundation::firstOrCreate(["foundation_name"=>$foundation]);
        });
    }
}
