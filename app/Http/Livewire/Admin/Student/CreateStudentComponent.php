<?php

namespace App\Http\Livewire\Admin\Student;

use App\Models\Student;
use Livewire\Component;
use App\Models\SchoolClass;
use Livewire\WithFileUploads;

class CreateStudentComponent extends Component
{
    use WithFileUploads;

    public $first_name, $middle_name, $last_name, $student_number, $school_class_id, $birthdate, $gender, $image, $email, $password;

    protected $rules = [
        'first_name' => 'required|min:3|regex:/^[a-zA-Z\s]+$/',
        'middle_name' => 'required|min:1|regex:/^[a-zA-Z\s]+$/',
        'last_name' => 'required|min:3|regex:/^[a-zA-Z\s]+$/',
        'student_number' => 'required|unique:students,student_number',
        'school_class_id' => 'required',
        'email' => 'required|email|unique:students,email',
        'password' => 'required|min:6|max:12',
        'birthdate' => 'required|date|before_or_equal:today|before_or_equal:-18 years',
        'gender' => 'required',
        'image' => 'required|image|max:2048'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveStudent()
    {
        $this->validate();

        $student = new Student();

        if(!empty($this->image)) {
            $fileName = $this->image->store('public/images');
        } else {
            $fileName = null;
        }

        $student->first_name = $this->first_name;
        $student->middle_name = $this->middle_name;
        $student->last_name = $this->last_name;
        $student->student_number = $this->student_number;
        $student->school_class_id = $this->school_class_id;
        $student->email = $this->email;
        $student->password = bcrypt($this->password);
        $student->birthdate = $this->birthdate;
        $student->gender = $this->gender;
        $student->image = $fileName;
        $student->save();

        $this->exit('Student added successfully');
    }

    public function exit($message)
    {
        $this->dispatchBrowserEvent('success', ['message' => $message]);
        $this->dispatchBrowserEvent('close-modal');
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
        $this->birthdate = '';
        $this->gender = '';
        $this->image = '';
    }

    public function render()
    {
        $classes = SchoolClass::all();
        return view('livewire.admin.student.create-student-component', compact('classes'))->layout('livewire.layouts.admin');
    }
}
