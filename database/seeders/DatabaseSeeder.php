<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
       $this->call(UsersTableSeeder::class);
       $this->call(CategoryTableSeeder::class);
       $this->call(TagsTableSeeder::class);
       $this->call(ThreadsTableSeeder::class);
       $this->call(NotificationSeeder::class);
    }
}
