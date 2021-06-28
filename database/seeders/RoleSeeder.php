<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB ;
use Illuminate\Database\Seeder;
use App\Models\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Role::factory()->count(5)->create();

        DB::table('roles')->insert([
            'name' =>  'admin' 
        ]);

        DB::table('roles')->insert([
            'name' =>  'instructor' 
        ]);

        DB::table('roles')->insert([
            'name' =>  'student' 
        ]);

    }
}
