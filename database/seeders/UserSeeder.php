<?php

 namespace Database\Seeders;

 use Illuminate\Database\Seeder;
 use Illuminate\Support\Facades\DB;
 use Illuminate\Support\Facades\Hash;
 use Illuminate\Database\Console\Seeds\WithoutModelEvents;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'MAIGA FAICAL',
            'username' => 'faicalmaiga',
            'email' =>'faicalmaiga78@gmail.com',
            'username' => 'faicalmaiga',

            'roles_id' => 1,
            'password' => Hash::make('Faical54@'),
            ]);


           

                DB::table('users')->insert([
                    'name' => 'KABORE ALI',
                    'username' => 'kaboreali',
                    'email' =>'kabore@gmail.com',
                    'username' => 'kaboreali',
                    
                    'roles_id' => 2,
                    'password' => Hash::make('kabore@'),
                    ]);    
    }
}
