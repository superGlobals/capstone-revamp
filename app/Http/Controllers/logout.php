<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class logout extends Controller
{
    public function logout()
    {
        auth()->logout();

        session()->invalidate();
        session()->regenerateToken();

        // $this->dispatchBrowserEvent('success', ['message' => 'Logout successfully']);

        return redirect()->route('login');
    }
}
