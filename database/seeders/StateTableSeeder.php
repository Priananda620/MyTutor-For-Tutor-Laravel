<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert([
            [
                'id' => 1,
                'stateOf' => 'kedah',
            ],
            [
                'id' => 2,
                'stateOf' => 'perak',
            ],
            [
                'id' => 3,
                'stateOf' => 'pahang',
            ],
            [
                'id' => 4,
                'stateOf' => 'negeri sembilan',
            ],
            [
                'id' => 5,
                'stateOf' => 'selangor',
            ],
            [
                'id' => 6,
                'stateOf' => 'perlis',
            ],
            [
                'id' => 7,
                'stateOf' => 'terengganu',
            ],
            [
                'id' => 8,
                'stateOf' => 'sabah',
            ],
            [
                'id' => 9,
                'stateOf' => 'sarawak',
            ],
            [
                'id' => 10,
                'stateOf' => 'malacca',
            ],
            [
                'id' => 11,
                'stateOf' => 'kelantan',
            ],
            [
                'id' => 12,
                'stateOf' => 'johor',
            ],
            [
                'id' => 13,
                'stateOf' => 'penang',
            ],

        ]);
    }
}
