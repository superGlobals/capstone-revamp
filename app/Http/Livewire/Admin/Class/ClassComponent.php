<?php

namespace App\Http\Livewire\Admin\Class;

use Livewire\Component;
use App\Models\SchoolClass;
use Livewire\WithPagination;

class ClassComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $course, $year, $section;
    public $search = '';
    public $class_id;

    protected $listeners = ['deleteConfirmed' => 'deleteClass'];

    protected $rules = [
        'course' => 'required|min:2|max:10',
        'year' => 'required',
        'section' => 'required|min:1|max:15'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveStudentClass()
    {
        $this->validate();

        $class = new SchoolClass();
        
        $class->course = $this->course;
        $class->year = $this->year;
        $class->section = $this->section;
        $class->save();

        $this->dispatchBrowserEvent('success', ['message' => 'Class added successfully']);
        $this->dispatchBrowserEvent('close-modal');
        $this->resetFields();
    }

    public function editClass(int $id)
    {
        $class = SchoolClass::findOrFail($id);

        $this->class_id = $class->id;
        $this->course = $class->course;
        $this->year = $class->year;
        $this->section = $class->section;
    }

    public function updateStudentClass()
    {
        $this->validate();

        $class = SchoolClass::findOrFail($this->class_id);
        $class->course = $this->course;
        $class->year = $this->year;
        $class->section = $this->section;

        $class->save();
        $this->dispatchBrowserEvent('success', ['message' => 'Class updated successfully']);
        $this->dispatchBrowserEvent('close-modal');
        $this->resetFields();

    }

    public function deleteConfirmation(int $id)
    {
        $this->class_id = $id;
        $this->dispatchBrowserEvent('delete-confirmation');
    }

    public function deleteClass()
    {
        $class = SchoolClass::findOrFail($this->class_id);
        $class->delete();
        $this->dispatchBrowserEvent('success', ['message' => 'Class deleted successfully']);
    }

    public function resetFields()
    {
        $this->course = '';
        $this->year = '';
        $this->section = '';
    }

    public function render()
    {
        $classes = SchoolClass::where('course', 'like', '%'.$this->search.'%')->orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.class.class-component', compact('classes'))->layout('livewire.layouts.admin');
    }
}
