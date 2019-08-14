<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Manager']);
        Role::create(['name' => 'Editor']);

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@me.com',
            'password' => bcrypt('password')
        ]);

        $user->roles()->attach(1, ['approved' => 1]);
        $user->roles()->attach(2);

        foreach($user->approvedRoles as $role){
            //info($role->name . '(time: ' . $role->pivot->created_at . ', approved: '. $role->pivot->approved . ')');
            info($role->name);
        }
    }
}
