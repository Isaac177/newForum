<?php

namespace App\Jobs;

use App\Http\Requests\CreateReplyRequest;
use App\Models\Reply;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mews\Purifier\Facades\Purifier;

class CreateReply implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $author;
    private $replyAble;
    private $body;

    public function __construct(string $author, string $replyAble, string $body)
    {
        $this->author = $author;
        $this->replyAble = $replyAble;
        $this->body = $body;
    }

    public static function fromRequest(CreateReplyRequest $request): self
    {
        return new static(
            $request->author(),
            $request->replyAble(),
            $request->body()
        );
    }


    public function handle(): Reply
    {
        $reply = new Reply(['body' => Purifier::clean($this->body)]);
        $reply->isAuthoredBy($this->author);
        $reply->to($this->replyAble);
        $reply->save();

        return $reply;
    }
}
