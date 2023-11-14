<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\user;
use App\Models\competency;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::create([
        //     'employee_id'       => '004206',
        //     'employee_name'     => 'Sobandi Afandi',
        //     'email'             => 'sobandi.afandi@capcx.com',
        //     'password'          => bcrypt('12345'),
        //     'role_id'           => 6
        // ]);

        User::create([
            'employee_id'       => '3748',
            'employee_name'     => 'Manuhara Bramandipo Topani',
            'email'             => 'MANUHARA.TOPANI@CAPCX.COM',
            'password'          => bcrypt('12345'),
            'role_id'           => 2
        ]);

        // Competency::create([
        //     'competency_id'     => 'M-BBM1-C01',
        //     'competency_area'   => 'MFG',
        //     'competency_type'   => 'Functional',
        //     'competency_name'   => 'PLANT UNIT OPERATION',
        //     'competency_bahasa' => 'PLANT UNIT OPERATION',
        //     'description'       => 'PLANT UNIT OPERATION',
        //     'description_bahasa'=> 'PLANT UNIT OPERATION',
        //     'status'            => 1
        // ]);


    }
}
