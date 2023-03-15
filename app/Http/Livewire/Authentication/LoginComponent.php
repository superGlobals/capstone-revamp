<?php

namespace App\Http\Livewire\Authentication;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LoginComponent extends Component
{
    public $email, $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function login()
    {
        $this->validate();

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if(Auth::guard('teacher')->attempt($credentials) || Auth::guard('student')->attempt($credentials)) {
            if(Auth::guard('teacher')->user()) {
                session()->regenerate();
                $this->dispatchBrowserEvent('success', ['message' => 'Login successfully']);
                return redirect()->route('index.teacher');

            } elseif(Auth::guard('student')->user()) {
                session()->regenerate();
                $this->dispatchBrowserEvent('success', ['message' => 'sLogin successfully']);
                return redirect()->route('/student');
                
            }
        } else {
            // Authentication Failed
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.'
            ]);
        }
    }

    public function render()
    {
        return view('livewire.authentication.login-component')->layout('livewire.layouts.app');
    }
}
