<?php

namespace App\Http\Livewire\Reply;

use App\Models\Reply;
use Livewire\Component;

class Update extends Component

{
    public $replyId;
    public $replyOrigBody;
    public $replyNewBody;

    public function mount(Reply $reply)
    {
        $this->replyId = $reply->id;
        $this->replyOrigBody = $reply->body;

        $this->initialize($reply);
    }

    public function updateReply()
    {
        $reply = Reply::findOrFail($this->replyId);
        $reply->body = $this->replyNewBody;
        $reply->save();
        session()->flash('message', 'Reply updated.');
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

    public function render()
    {
        return view('livewire.reply.update');
    }
}
