<?php

use App\Author;
use App\Book;
use App\Post;
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
            'role_id' => 1,
            'name' => 'Admin',
            'email' => 'admin@me.com',
            'password' => bcrypt('password')
        ]);
        $user = User::create([
            'role_id' => 2,
            'name' => 'Manager',
            'email' => 'manager@me.com',
            'password' => bcrypt('password')
        ]);
        $user = User::create([
            'role_id' => 3,
            'name' => 'Editor',
            'email' => 'editor@me.com',
            'password' => bcrypt('password')
        ]);

        for($i=1; $i<=10; $i++){
            Post::create([
                'user_id' => rand(1,3),
                'title'=> str_random(10),
                'post_text' => str_random(200)
            ]);
        }

        // $user->roles()->attach(1, ['approved' => 1]);
        // $user->roles()->attach(2);

        // foreach($user->approvedRoles as $role){
        //     //info($role->name . '(time: ' . $role->pivot->created_at . ', approved: '. $role->pivot->approved . ')');
        //     info($role->name);
        // }

        factory(Author::class, 50)->create();
        factory(Book::class, 100)->create();
    }
}
