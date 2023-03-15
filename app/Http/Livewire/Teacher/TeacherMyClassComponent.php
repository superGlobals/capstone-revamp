<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Subject;
use Livewire\Component;
use App\Models\SchoolClass;
use App\Models\TeacherClass;

class TeacherMyClassComponent extends Component
{
    public $school_class_id, $subject_id, $teacher_id;
    public $classes = [], $subjects = [];

    public function mount()
    {
        $this->teacher_id = auth()->guard('teacher')->user()->id;
    }

    public function showData()
    {
        $this->classes = SchoolClass::all();
        $this->subjects = Subject::all();
    }

    public function saveTeacherClass()
    {
        $this->validate([
            'school_class_id' => 'required',
            'subject_id' => 'required',
            'teacher_id' => 'required',
        ]);

        $teacherClass = new TeacherClass();
        $teacherClass->teacher_id = $this->teacher_id;
        $teacherClass->subject_id = $this->subject_id;
        $teacherClass->school_class_id = $this->school_class_id;

        $teacherClass->save();

        $this->dispatchBrowserEvent('success', ['message' => 'Class added successfully']);
        $this->dispatchBrowserEvent('close-modal');
        $this->resetFields();
    }

    public function resetFields()
    {
        $this->school_class_id = '';
        $this->subject_id = '';
    }

    public function render()
    {
        $teacherClass = TeacherClass::where('teacher_id', $this->teacher_id)->orderBy('id', 'DESC')->get();
        return view('livewire.teacher.teacher-my-class-component', compact('teacherClass'))->layout('livewire.layouts.teacher');
    }
}
