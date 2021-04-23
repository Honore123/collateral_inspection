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
            'Plywood Ceiling',
            'Gypsum Ceiling',
            'Wooden Ceiling',
            'Acoustic Ceiling',
            'China Light Weight Ceiling PVC',


        ])->each(function($ceiling){
            Ceiling::firstOrCreate(["ceiling_name"=>$ceiling]);
        });
    }
}
