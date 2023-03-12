<?php

namespace App\Http\Livewire\Admin\Teacher;

use App\Models\Teacher;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class EditComponent extends Component
{
    use WithFileUploads;

    public $first_name, $middle_name, $last_name, $email, $password, $birthdate, $gender, $image, $teacher_id;
    public $teacher;

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

    public function mount(int $id)
    {
        $this->teacher_id = $id;

        $this->teacher = Teacher::findOrFail($id);

        $this->first_name = $this->teacher->first_name;
        $this->middle_name = $this->teacher->middle_name;
        $this->last_name = $this->teacher->last_name;
        $this->email = $this->teacher->email;
        $this->birthdate = $this->teacher->birthdate;
        $this->gender = $this->teacher->gender;
        $this->image = $this->teacher->image;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updateTeacher()
    {
        $this->validate([
            'first_name' => 'required|min:3|regex:/^[a-zA-Z\s]+$/',
            'middle_name' => 'required|min:1|regex:/^[a-zA-Z\s]+$/',
            'last_name' => 'required|min:3|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|email|unique:teachers,email,'.$this->teacher_id,
            'password' => 'nullable|min:6|max:12',
            'birthdate' => 'required|date|before_or_equal:today|before_or_equal:-18 years',
            'gender' => 'required',
            'image' => 'nullable|max:2048'
        ]);

        if($this->password) {
            $this->teacher->password = bcrypt($this->password);
        }

        if(!empty($this->image)) {
            if($this->image !== 'uploads/teacher/no_image.jpg') {
                File::delete($this->image);
                $fileName = time() . '.' . $this->image->extension();
                $this->image->storeAs('teacher', $fileName);
                $this->teacher->image = 'uploads/teacher/'.$fileName;
            }

            $fileName = time() . '.' . $this->image->extension();
            $this->image->storeAs('teacher', $fileName);
            $this->teacher->image = 'uploads/teacher/'.$fileName;
        }

        $this->teacher->first_name = $this->first_name;
        $this->teacher->middle_name = $this->middle_name;
        $this->teacher->last_name = $this->last_name;
        $this->teacher->email = $this->email;
        $this->teacher->birthdate = $this->birthdate;
        $this->teacher->gender = $this->gender;

        $this->teacher->save();

        $this->dispatchBrowserEvent('success', ['message' => 'Teacher updated successfully']);    
    }

    public function render()
    {
        return view('livewire.admin.teacher.edit-component')->layout('livewire.layouts.admin');
    }
}
