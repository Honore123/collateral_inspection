<?php

use Illuminate\Database\Seeder;
use App\Models\Doorwindow;

class DoorWindowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            'Timber',
            'Metallic',
        ])->each(function($doorwindow){
            Doorwindow::firstOrCreate(["doorwindow"=>$doorwindow]);
        });
    }
}
