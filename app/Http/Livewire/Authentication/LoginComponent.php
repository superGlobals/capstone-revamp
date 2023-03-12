<?php

namespace App\Http\Livewire\Authentication;

use Livewire\Component;

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
    }

    public function render()
    {
        return view('livewire.authentication.login-component')->layout('livewire.layouts.app');
    }
}
