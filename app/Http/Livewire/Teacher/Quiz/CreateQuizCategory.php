<?php

namespace App\Http\Livewire\Teacher\Quiz;

use Livewire\Component;

class CreateQuizCategory extends Component
{
    public function render()
    {
        return view('livewire.teacher.quiz.create-quiz-category')->layout('livewire.layouts.teacher');
    }
}
