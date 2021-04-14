<?php

use App\Models\Foundation;
use Illuminate\Database\Seeder;

class FoundationsTableSeeder extends Seeder
{
    public function run()
    {
        $foundations = [
            [
                'id'    => 1,
                'title' => 'Levelling',
            ],
            [
                'id'    => 2,
                'title' => 'Foundation excavation',
            ],
            [
                'id'    => 3,
                'title' => 'Ruble stones with ciment',
            ],

        ];

        Foundation::insert($foundations);
    }
}