<?php

namespace App\Http\Livewire\Reply;

use App\Models\Reply;
use Livewire\Component;

class Update extends Component

// Update is a Livewire component that is used to update a reply

{
    public $oldReply;

    public function mount(Reply $reply)
    {
        $this->oldReply = $reply->body();
    }

    public function render()
    {
        return view('livewire.reply.update');
    }
}
