<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function show(User $user): View
    {
        return view('pages.profile.show', [
            'user' => $user,
        ]);
    }
}
