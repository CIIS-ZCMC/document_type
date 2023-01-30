<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          // Default credentials
          \App\Models\ClientType::insert([
            [ 
                'name' => 'Senior',
                
            ]
        ]);
        \App\Models\ClientType::insert([
            [ 
                'name' => 'Solo Parent',
                
            ]
        ]);
        \App\Models\ClientType::insert([
            [ 
                'name' => 'PWD',
                
            ]
        ]);
        \App\Models\ClientType::insert([
            [ 
                'name' => 'Citizen',
                
            ]
        ]);

    }
}
