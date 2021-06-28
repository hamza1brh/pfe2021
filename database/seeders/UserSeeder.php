<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB ;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       



        DB::table('users')->insert([
            'name' =>  'admin' , 
            'email' => 'admin@admin.com',
            'password'=>  Hash::make('adminadmin'),
            
        ]);

        DB::table('users')->insert([
            'name' =>  'light yagami' , 
            'email' => 'light@kira.com',
            'password'=>  Hash::make('adminadmin'),
            
        ]);

        // User::factory()->times(10)->create();
    }
}
