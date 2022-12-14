<?php

namespace App\Http\Livewire\Reply;

use App\Models\Reply;
use App\Policies\ReplyPolicy;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\View\View;
use Livewire\Component;

class Update extends Component

{
    use AuthorizesRequests;
    public $replyId;
    public $replyOrigBody;
    public $replyNewBody;
    public $author;
    public $createdAt;

    protected $listeners = ['deleteReply'];

    public function mount(Reply $reply)
    {
        $this->replyId = $reply->id;
        $this->replyOrigBody = $reply->body;
        $this->author = $reply->author;
        $this->createdAt = $reply->created_at;

        $this->initialize($reply);
    }

    public function updateReply()
    {
        $reply = Reply::findOrFail($this->replyId);

        $this->authorize(ReplyPolicy::UPDATE, $reply);

        $reply->body = $this->replyNewBody;
        $reply->save();

        $this->initialize($reply);
    }

    public function initialize(Reply $reply)
    {
        $this->replyOrigBody = $reply->body;
        $this->replyNewBody = $reply->replyOrigBody;
    }

    public function update(Reply $reply)
    {
        $reply->update(['body' => $this->oldReply]);
        $this->emit('replyUpdated');
    }

    public function deleteReply($page)
    {
        session()->flash('message', 'Reply deleted.');
        return redirect()->to('/threads/' . $page);
    }

    public function render(): View
    {
        return view('livewire.reply.update', [
            'replyId' => $this->replyId,
            'replyOrigBody' => $this->replyOrigBody,
            'replyNewBody' => $this->replyNewBody,
            'author' => $this->author,
            'createdAt' => $this->createdAt,
        ]);
    }
}
