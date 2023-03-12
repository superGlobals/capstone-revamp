<?php

namespace App\Http\Livewire\Admin\Teacher;

use App\Models\Teacher;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class IndexComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $teacher_id;

    protected $listeners = ['deleteConfirmed' => 'deleteTeacher'];

    public function deleteConfirmation($id)
    {
        $this->teacher_id = $id;
        $this->dispatchBrowserEvent('delete-confirmation');
    }

    public function deleteTeacher()
    {
        $teacher = Teacher::findOrFail($this->teacher_id);
        if($teacher->image !== 'uploads/teacher/no_image.jpg') {
            if(File::exists($teacher->image)) {
                File::delete($teacher->image); 
            }
        }
        $teacher->delete();
        $this->dispatchBrowserEvent('success', ['message' => 'Teacher deleted successfully']);
    }

    public function render()
    {
        $teachers = Teacher::where('first_name', 'like', '%'.$this->search.'%')->orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.teacher.index-component', compact('teachers'))->layout('livewire.layouts.admin');
    }
}
