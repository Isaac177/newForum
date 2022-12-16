<?php

namespace App\Http\Livewire\Notifications;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use AuthorizesRequests;
    use WithPagination;

    public function render()
    {
        return view('livewire.notifications.index', [
            'notifications' => Auth::user()->unreadNotifications()->paginate(10),
        ]);
    }
}
