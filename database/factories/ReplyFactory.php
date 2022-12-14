<?php

namespace Database\Factories;

use App\Models\Reply;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReplyFactory extends Factory
{
    protected $model = Reply::class;

    public function definition()
    {
        return [
            'body' => $this->faker->text(),
            'author_id' => $attributes['author_id'] ?? User::factory()->create()->id(),
            'replyAble_id' => $attributes['replyAble_id'] ?? Thread::factory()->create()->id(),
            'replyAble_type' => Thread::TABLE,
        ];
    }
}
