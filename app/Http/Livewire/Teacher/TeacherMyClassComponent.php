<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Subject;
use Livewire\Component;
use App\Models\SchoolClass;

class TeacherMyClassComponent extends Component
{
    public $class_id, $subject_id;
    public $classes = [], $subjects = [];

    public function showData()
    {
        $this->classes = SchoolClass::all();
        $this->subjects = Subject::all();
    }

    public function resetFields()
    {
        $this->class_id = '';
        $this->subject_id = '';
    }

    public function saveTeacherClass()
    {
        $this->validate([
            'class_id' => 'required',
            'subject_id' => 'required',
        ]);

    }

    public function render()
    {
        return view('livewire.teacher.teacher-my-class-component')->layout('livewire.layouts.teacher');
    }
}
