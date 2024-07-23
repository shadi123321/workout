<?php

namespace Database\Seeders;

use App\Models\exercise;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vgoal = [
            ['id' => 1, 'level_id' => '2','muscle_id' => '2','gender_id' => '2','goal_id' => '4','name' => 'barmMbuild'],
            ['id' => 2, 'level_id' => '3','muscle_id' => '3','gender_id' => '3','goal_id' => '2','name' => 'mlegsFfit'],
            ['id' => 3, 'level_id' => '2','muscle_id' => '4','gender_id' => '2','goal_id' => '3','name' => 'bbackMyoga'],
            ['id' => 4, 'level_id' => '4','muscle_id' => '5','gender_id' => '2','goal_id' => '4','name' => 'astomMbody'],
            ['id' => 5, 'level_id' => '3','muscle_id' => '2','gender_id' => '3','goal_id' => '2','name' => 'marmFfit'],
            ['id' => 6, 'level_id' => '2','muscle_id' => '3','gender_id' => '2','goal_id' => '3','name' => 'blegMyoga'],
        ];
        exercise::insert($vgoal);
    }
}
