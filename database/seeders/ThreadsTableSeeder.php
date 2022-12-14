<?php

namespace Database\Seeders;

use App\Models\Reply;
use App\Models\Thread;
use Illuminate\Database\Seeder;

class ThreadsTableSeeder extends Seeder
{

    public function run()
    {
        Thread::factory()->count(50)->create([
            'author_id' => rand(1, 5),
        ]);

        Reply::factory()->create([
            'author_id' => 2,
            'replyAble_id' => 1,
        ]);

        Reply::factory()->create([
            'author_id' => 2,
            'replyAble_id' => 1,
        ]);

        Reply::factory()->create([
            'author_id' => 2,
            'replyAble_id' => 2,
        ]);

        Reply::factory()->create([
            'author_id' => 2,
            'replyAble_id' => 2,
        ]);
    }
}
