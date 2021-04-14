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
            'Simple door',
            'Door in simple wood',
            'Door in triplex',
            'Door in beam',
            'Door in libuyu',
            'Door in special wood',
            'Door in cypress',
            'Door in Umusave',
            'Simple metallic door with wire netting',
            'Double metallic door with wire netting ',
            'Gate'

        ])->each(function($doorwindow){
            Doorwindow::firstOrCreate(["doorwindow"=>$doorwindow]);
        });
    }
}
