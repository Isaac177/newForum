<?php

namespace App\Http\Livewire;

use App\Jobs\LikeReplyJob;
use App\Jobs\UnlikeReplyJob;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Livewire\Component;

class LikeReply extends Component
{
    use DispatchesJobs;

    public $reply;

    public function mount($reply)
    {
        $this->reply = $reply;
    }

    public function toggleLike()
    {
        if ($this->reply->isLikedBy(auth()->user())) {
            $this->dispatchSync(new UnlikeReplyJob($this->reply, auth()->user()));
        } else {
            $this->dispatchSync(new LikeReplyJob($this->reply, auth()->user()));
        }
    }

    public function render()
    {
        return view('livewire.like-reply');
    }
}
