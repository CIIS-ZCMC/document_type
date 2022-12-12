<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Default credentials
        \App\Models\SectorType::insert([
            [ 
                'name' => 'Senior',
                
            ]
        ]);
        \App\Models\SectorType::insert([
            [ 
                'name' => 'Indigent',
                
            ]
        ]);
        \App\Models\SectorType::insert([
            [ 
                'name' => 'Solo Parent',
                
            ]
        ]);
        \App\Models\SectorType::insert([
            [ 
                'name' => 'PWD',
                
            ]
        ]);
        \App\Models\SectorType::insert([
            [ 
                'name' => 'Citizen',
                
            ]
        ]);

    }
}
