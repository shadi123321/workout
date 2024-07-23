<?php

namespace Database\Seeders;

use App\Models\gender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $vgender = [
            ['id' => 1, 'type' => 'unsign'],
            ['id' => 2, 'type' => 'male'],
            ['id' => 3, 'type' => 'female'],
        ];
        gender::insert($vgender);
    }
    }

