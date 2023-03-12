<?php

namespace App\Http\Livewire\Admin\Teacher;

use App\Models\Teacher;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateComponent extends Component
{
    use WithFileUploads;

    public $first_name, $middle_name, $last_name, $email, $password, $birthdate, $gender, $image;

    protected $rules = [
        'first_name' => 'required|min:3|regex:/^[a-zA-Z\s]+$/',
        'middle_name' => 'required|min:1|regex:/^[a-zA-Z\s]+$/',
        'last_name' => 'required|min:3|regex:/^[a-zA-Z\s]+$/',
        'email' => 'required|email|unique:teachers,email',
        'password' => 'required|min:6|max:12',
        'birthdate' => 'required|date|before_or_equal:today|before_or_equal:-18 years',
        'gender' => 'required',
        'image' => 'nullable|image|max:2048'
    ];

    protected $messages = [
        'birthdate.required' => 'Please enter your birthdate.',
        'birthdate.date' => 'Please enter a valid birthdate.',
        'birthdate.before_or_equal' => 'You must be at least 18 years old to register.',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveTeacher()
    {
        $this->validate();

        $teacher = new Teacher();

        if(!empty($this->image)) {
            $fileName = $this->image->store('public/images');
        } else {
            $fileName = null;
        }

        $teacher->first_name = $this->first_name;
        $teacher->middle_name = $this->middle_name;
        $teacher->last_name = $this->last_name;
        $teacher->email = $this->email;
        $teacher->password = bcrypt($this->password);
        $teacher->birthdate = $this->birthdate;
        $teacher->gender = $this->gender;
        $teacher->image = $fileName;

        $teacher->save();

        $this->dispatchBrowserEvent('success', ['message' => 'Teacher added successfully']);
        $this->resetFields();       
    }

    public function resetFields()
    {
        $this->first_name = '';
        $this->middle_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->password = '';
        $this->birthdate = '';
        $this->gender = '';
        $this->image = '';
    }

    public function render()
    {
        return view('livewire.admin.teacher.create-component')->layout('livewire.layouts.admin');
    }
}
