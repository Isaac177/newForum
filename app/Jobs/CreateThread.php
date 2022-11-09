<?php

namespace App\Jobs;

use App\Http\Requests\ThreadStoreRequest;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;
use Mews\Purifier\Facades\Purifier;

class CreateThread implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $title;
    private $body;
    private $category;
    private $tags;
    private $author;

    public function __construct(string $title, string $body, string $category, array $tags, User $author)
    {
        $this->title = $title;
        $this->body = $body;
        $this->category = $category;
        $this->tags = $tags;
        $this->author = $author;
    }

    public static function fromRequest(ThreadStoreRequest $request): self
    {
        return new static(
            $request->title(),
            $request->body(),
            $request->category(),
            $request->tags(),
            $request->author(),
        );
    }

    public function handle(): Thread
    {
        $thread = new Thread;
        $thread->title = $this->title;
        $thread->slug = Str::slug($this->title);
        $thread->body = Purifier::clean($this->body);
        $thread->category_id = $this->category;
        $thread->author_id = $this->author->id;
        $thread->save();
        $thread->tags = $this->tags;
        //$thread->tags()->sync($this->tags);

        /*$thread = new Thread([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'body' => Purifier::clean($this->body),
            'category_id' => $this->category,
            //'author_id' => $this->author->id,
        ]);

        $thread->authoredBy($this->author);
        $thread->syncTags($this->tags);
        $thread->save();*/

        return $thread;
    }
}
