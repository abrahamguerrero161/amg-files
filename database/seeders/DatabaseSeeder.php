<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
          //Storage::deleteDirectory('posts');
          //Storage::makeDirectory('posts');

          //\App\Models\Post::factory(100)->create();

          //User::factory(10)->create();

          $this->call(RoleSeeder::class);
          $this->call(UserSeeder::class);

          User::factory(10)->create()->each(function($user){
                $user->assignRole('viewer');
          });
    }
}
