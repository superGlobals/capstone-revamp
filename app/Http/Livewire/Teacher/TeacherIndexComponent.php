<?php

namespace App\Http\Livewire\Teacher;

use Livewire\Component;

class TeacherIndexComponent extends Component
{
    public function render()
    {
        return view('livewire.teacher.teacher-index-component')->layout('livewire.layouts.teacher');
    }
}
