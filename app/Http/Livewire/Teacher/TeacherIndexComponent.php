<?php

namespace App\Http\Livewire\Teacher;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class TeacherIndexComponent extends Component
{
    public function render()
    {
        $qwe = auth()->guard('teacher')->user()->id;
        return view('livewire.teacher.teacher-index-component', ['qwe' => $qwe])->layout('livewire.layouts.teacher');
    }
}
