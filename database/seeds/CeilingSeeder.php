<?php

use Illuminate\Database\Seeder;
use App\Models\Ceiling;

class CeilingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            'In reed',
            'In papyrus',
            'In sheet metal',
            'In triplex',
            'In unalit on wood',
            'In beam',
            'Arabian',
            'In reinforced concrete with wiremesh',
            'Eternit sheet on wood',
            'In strip',
            'In cartons'

        ])->each(function($ceiling){
            Ceiling::firstOrCreate(["ceiling_name"=>$ceiling]);
        });
    }
}
