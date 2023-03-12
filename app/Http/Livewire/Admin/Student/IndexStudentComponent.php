<?php

namespace App\Http\Livewire\Admin\Student;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class IndexStudentComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public function render()
    {
        $students = Student::where('first_name', 'like', '%'.$this->search.'%')->orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.student.index-student-component', compact('students'))->layout('livewire.layouts.admin');
    }
}
