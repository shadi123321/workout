<?php

namespace Database\Seeders;

use App\Models\muscle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MuscleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vgoal = [
            ['id' => 1, 'muscles' => 'unsign'],
            ['id' => 2, 'muscles' => 'arm'],
            ['id' => 3, 'muscles' => 'legs'],
            ['id' => 4, 'muscles' => 'back'],
            ['id' => 5, 'muscles' => 'stomach'],
        ];
        muscle::insert($vgoal);
    }
}
