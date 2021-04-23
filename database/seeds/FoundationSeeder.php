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
            'Stones Foundation',
            'Bricks Foundation',
            'Concrete Foundation',


        ])->each(function($foundation){
            Foundation::firstOrCreate(["foundation_name"=>$foundation]);
        });
    }
}
