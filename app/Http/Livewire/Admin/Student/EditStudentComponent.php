<?php

namespace App\Http\Livewire\Admin\Student;

use App\Models\Student;
use Livewire\Component;
use App\Models\SchoolClass;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class EditStudentComponent extends Component
{
    use WithFileUploads;

    public $first_name, $middle_name, $last_name, $student_number, $class_id, $birthdate, $gender, $image, $email, $password;
    public $student_id, $student;

    protected $rules = [
        'first_name' => 'required|min:3|regex:/^[a-zA-Z\s]+$/',
        'middle_name' => 'required|min:1|regex:/^[a-zA-Z\s]+$/',
        'last_name' => 'required|min:3|regex:/^[a-zA-Z\s]+$/',
        'student_number' => 'required|unique:students,student_number',
        'class_id' => 'required',
        'email' => 'required|email|unique:students,email',
        'password' => 'required|min:6|max:12',
        'birthdate' => 'required|date|before_or_equal:today|before_or_equal:-18 years',
        'gender' => 'required',
        'image' => 'nullable|image|max:2048'
    ];

    public function mount(int $id)
    {
        $this->student_id = $id;

        $this->student = Student::findOrFail($id);
        $this->first_name = $this->student->first_name;
        $this->middle_name = $this->student->middle_name;
        $this->last_name = $this->student->last_name;
        $this->student_number = $this->student->student_number;
        $this->class_id = $this->student->class_id;
        $this->birthdate = $this->student->birthdate;
        $this->gender = $this->student->gender;
        $this->email = $this->student->email;    
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

    }

    public function updateStudent()
    {
    $this->validate([
        'first_name' => 'required|min:3|regex:/^[a-zA-Z\s]+$/',
        'middle_name' => 'required|min:1|regex:/^[a-zA-Z\s]+$/',
        'last_name' => 'required|min:3|regex:/^[a-zA-Z\s]+$/',
        'student_number' => 'required|unique:students,student_number,'.$this->student_id,
        'class_id' => 'required',
        'email' => 'required|email|unique:students,email,'.$this->student_id,
        'password' => 'nullable|min:6|max:12',
        'birthdate' => 'required|date|before_or_equal:today|before_or_equal:-18 years',
        'gender' => 'required',
        'image' => 'nullable|image|max:2048'
    ]);

    if($this->password) {
        $this->student->password = bcrypt($this->password);
    }

    if (!empty($this->image)) {
        // Delete the old image if it exists
        if ($this->student->image) {
            Storage::delete($this->student->image);
        }

        $fileName = $this->image->store('public/images');
    } else {
        $fileName = null;
    }

    $this->student->first_name = $this->first_name;
    $this->student->middle_name = $this->middle_name;
    $this->student->last_name = $this->last_name;
    $this->student_number = $this->student_number;
    $this->class_id = $this->class_id;
    $this->student->email = $this->email;
    $this->student->birthdate = $this->birthdate;
    $this->student->gender = $this->gender;
    $this->student->image = $fileName;

    $this->student->save();

    $this->dispatchBrowserEvent('success', ['message' => 'Student updated successfully']);
    $this->dispatchBrowserEvent('close-modal');
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
        $this->class_id = '';
        $this->email = '';
        $this->password = '';
        $this->birthdate = '';
        $this->gender = '';
        $this->image = '';
    }

    public function render()
    {
        $classes = SchoolClass::all();
        return view('livewire.admin.student.edit-student-component', compact('classes'))->layout('livewire.layouts.admin');
    }
}
