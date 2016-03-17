<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        DB::table('users')->truncate();
        DB::table('roles')->truncate();
        DB::table('role_users')->truncate();

        // Create roles
        Sentinel::getRoleRepository()->createModel()->create([
            'name' => 'Admin',
            'slug' => 'admin',
        ]);

        Sentinel::getRoleRepository()->createModel()->create([
            'name' => 'Player',
            'slug' => 'player',
        ]);

        $adminRole = Sentinel::findRoleByName('Admin');
        $admin = User::create([
            'first_name' => 'Dummy Admin',
            'last_name' => 'Johnny',
            'email' => 'dummyemail@mail.com',
            'username' => 'admin',
            'password' => bcrypt('admin'),
        ]);

        // Add user to role and activate by default
        $adminRole->users()->attach($admin);
        $activation = Activation::create($admin);
        Activation::complete($admin, $activation->code);
        
    }
}
