<?php

namespace Database\Seeders;

use App\Models\goal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $vgoal = [
            ['id' => 1, 'type' => 'unsign'],
            ['id' => 2, 'type' => 'fitness'],
            ['id' => 3, 'type' => 'yoga'],
            ['id' => 4, 'type' => 'bodybuilding'],
        ];
        goal::insert($vgoal);
    }
}