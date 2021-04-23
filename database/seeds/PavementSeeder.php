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
            'Stones Pavement',
            'Concrete Pavement',
            'Ceramic Tiles Pavement',
            'Screed Cement Pavement',
            'Rough Cement Pavement',
            'Asphalt Pavement',


        ])->each(function($pavement){
            Pavement::firstOrCreate(["pavement_name"=>$pavement]);
        });
    }
}
