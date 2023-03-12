<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Teacher;
use Livewire\Component;

class TeacherRegisterComponent extends Component
{
    public $first_name, $middle_name, $last_name, $email, $password;

    protected $rules = [
        'first_name' => 'required|min:3|regex:/^[a-zA-Z\s]+$/',
        'middle_name' => 'nullable|min:1|regex:/^[a-zA-Z\s]+$/',
        'last_name' => 'required|min:3|regex:/^[a-zA-Z\s]+$/',
        'email' => 'required|email|unique:teachers,email',
        'password' => 'required|min:6|max:12',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function teacherRegister()
    {
        $this->validate();

        $teacher = new Teacher();

        $teacher->first_name = $this->first_name;
        $teacher->middle_name = $this->middle_name;
        $teacher->last_name = $this->last_name;
        $teacher->email = $this->email;
        $teacher->password = bcrypt($this->password);

        $teacher->save();

        $this->exit('Registered successfully');

    }

    public function exit($message)
    {
        $this->dispatchBrowserEvent('success', ['message' => $message]);
        $this->resetFields();
    }

    public function resetFields()
    {
        $this->first_name = '';
        $this->middle_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->password = '';
    }

    public function render()
    {
        return view('livewire.teacher.teacher-register-component')->layout('livewire.layouts.app');
    }
}
