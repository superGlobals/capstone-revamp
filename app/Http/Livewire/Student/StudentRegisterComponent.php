<?php

namespace App\Http\Livewire\Student;

use App\Models\SchoolClass;
use App\Models\Student;
use App\Models\StudentClass;
use Livewire\Component;

class StudentRegisterComponent extends Component
{
    public $first_name, $middle_name, $last_name, $student_number, $school_class_id, $email, $password;

    protected $rules = [
        'first_name' => 'required|min:3|regex:/^[a-zA-Z\s]+$/',
        'middle_name' => 'nullable|min:1|regex:/^[a-zA-Z\s]+$/',
        'last_name' => 'required|min:3|regex:/^[a-zA-Z\s]+$/',
        'student_number' => 'required|unique:students,student_number',
        'school_class_id' => 'required',
        'email' => 'required|email|unique:students,email',
        'password' => 'required|min:6|max:12',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function studentRegister()
    {
        $this->validate();

        $student = new Student();

        $student->first_name = $this->first_name;
        $student->middle_name = $this->middle_name;
        $student->last_name = $this->last_name;
        $student->student_number = $this->student_number;
        $student->school_class_id = $this->school_class_id;
        $student->email = $this->email;
        $student->password = bcrypt($this->password);

        $student->save();

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
        $this->student_number = '';
        $this->school_class_id = '';
        $this->email = '';
        $this->password = '';
    }

    public function render()
    {
        $classes = SchoolClass::all();
        return view('livewire.student.student-register-component', compact('classes'))->layout('livewire.layouts.app');
    }
}
