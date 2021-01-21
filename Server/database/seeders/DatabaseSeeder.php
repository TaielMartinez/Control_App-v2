<?php


use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Users
        DB::table('users')->insert([
            'name' => 'Taiel Martinez',
            'email' => 'devops@localhost.com',
            'password' => bcrypt('12345')
        ]);
        DB::table('users_roles')->insert([
            'users_id' => 1,
            'rol_id' => 3
        ]);


        // Roles
        DB::table('roles')->insert([
            'name' => 'User',
            'code' => 'user'
        ]);
        DB::table('roles')->insert([
            'name' => 'Admin',
            'code' => 'admin'
        ]);
        DB::table('roles')->insert([
            'name' => 'Sysadmin',
            'code' => 'sysadmin'
        ]);


        // Business
        DB::table('business')->insert([
            'token' => 'bb7dc599-99e0-420b-a8c9-507b0118c1a9',
            'name' => 'Empresa de ejemplo',
            'email' => 'empresa@ejemplo.com'
        ]);
        DB::table('users_business')->insert([
            'users_id' => 1,
            'business_id' => 1
        ]);
    }
}
