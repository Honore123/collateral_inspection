<?php

use Illuminate\Database\Seeder;
use App\Models\TenureType;
class TenureTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            'Free hold',
            'Lease hold (with period)',
            'Condominium',

        ])->each(function ($tenure){
            TenureType::firstOrCreate(["tenure_type"=>$tenure]);
        });
    }
}
