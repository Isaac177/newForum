<?php

namespace App\Http\Livewire\Thread;

use App\Models\Thread;
use App\Policies\ThreadPolicy;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Delete extends Component
{
    use AuthorizesRequests;

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
        $this->authorize(ThreadPolicy::DELETE, $this->thread);

        $this->thread->delete();

        $this->confirmingThreadDeletion = false;

        session()->flash('success', 'Thread deleted!');

        return redirect()->route('threads.index');
    }

    public function render()
    {
        return view('livewire.thread.delete');
    }
}
