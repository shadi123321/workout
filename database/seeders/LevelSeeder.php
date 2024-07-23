<?php

namespace Database\Seeders;

use App\Models\level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vgoal = [
            ['id' => 1, 'level' => 'unsign'],
            ['id' => 2, 'level' => 'beginner'],
            ['id' => 3, 'level' => 'intermediate'],
            ['id' => 4, 'level' => 'advance'],
        ];
        level::insert($vgoal);
    }
}
