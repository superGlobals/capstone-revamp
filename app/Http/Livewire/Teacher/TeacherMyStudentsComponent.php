<?php

namespace App\Http\Livewire\Teacher;

use Livewire\Component;

class TeacherMyStudentsComponent extends Component
{
    public function render()
    {
        return view('livewire.teacher.teacher-my-students-component')->layout('livewire.layouts.teacher');
    }
}
