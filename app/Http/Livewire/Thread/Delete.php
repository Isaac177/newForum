<?php

namespace App\Http\Livewire\Thread;

use Livewire\Component;

class Delete extends Component
{
    public $thread;
    public $confirmingThreadDeletion = false;

    public function confirmThreadDeletion()
    {
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('confirming-thread-deletion');
        $this->confirmingThreadDeletion = true;
    }

    public function deleteThread()
    {
        $this->thread->delete();

        session()->flash('success', 'Thread deleted!');

        return redirect()->route('threads.index');
    }

    public function render()
    {
        return view('livewire.thread.delete');
    }
}
