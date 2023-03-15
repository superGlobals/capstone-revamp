<?php

namespace App\Http\Livewire\Teacher\Quiz;

use App\Models\Quiz;
use Livewire\Component;
use Livewire\WithPagination;

class QuizIndexCategory extends Component
{
    use WithPagination;

    public $quiz_title, $description, $teacher_id;

    protected $rules = [
        'quiz_title' => 'required|min:3|max:30',
        'description' => 'nullable|min:5|max:80',
    ];

    public function mount()
    {
        $this->teacher_id = auth()->guard('teacher')->user()->id;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

    }

    public function resetFields()
    {
        $this->quiz_title = '';
        $this->description = '';
    }

    public function storeQuizCategory()
    {
        $this->validate();

        $quiz = new Quiz();
        $quiz->teacher_id = $this->teacher_id;
        $quiz->quiz_title = $this->quiz_title;
        $quiz->description = $this->description;
        $quiz->save();

        $this->dispatchBrowserEvent('success', ['message' => 'Quiz category added successfully']);
        $this->dispatchBrowserEvent('close-modal');
        $this->resetFields();
    }

    public function render()
    {
        $quizzes = Quiz::where('teacher_id', $this->teacher_id)->orderBy('id', 'DESC')->paginate(10);
        return view('livewire.teacher.quiz.quiz-index-category', compact('quizzes'))->layout('livewire.layouts.teacher');
    }
}
