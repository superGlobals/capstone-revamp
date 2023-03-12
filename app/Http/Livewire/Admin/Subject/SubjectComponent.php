<?php

namespace App\Http\Livewire\Admin\Subject;

use App\Models\Subject;
use Livewire\Component;
use Livewire\WithPagination;

class SubjectComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $subject_code, $subject_title, $unit, $description;
    public $search = '';
    public $subject_id;

    protected $listeners = ['deleteConfirmed' => 'deleteSubject'];

    protected $rules = [
        'subject_code' => 'required|min:3|max:50|unique:subjects,subject_code',
        'subject_title' => 'required|min:3|max:100',
        'unit' => 'required',
        'description' => 'nullable|min:3',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveSubjectClass()
    {
        $this->validate();

        $subject = new Subject();
        $subject->subject_code = $this->subject_code;
        $subject->subject_title = $this->subject_title;
        $subject->unit = $this->unit;
        $subject->description = $this->description;
        $subject->save();

        $this->exit('Subject added successfully');
    }

    public function editSubject(int $id)
    {
        $subject = Subject::findOrFail($id);

        $this->subject_id = $subject->id;
        $this->subject_code = $subject->subject_code;
        $this->subject_title = $subject->subject_title;
        $this->unit = $subject->unit;
        $this->description = $subject->description;
    }

    public function updateSubject()
    {
        $this->validate([
            'subject_code' => 'required|min:3|max:50|unique:subjects,subject_code,'.$this->subject_id,
            'subject_title' => 'required|min:3|max:100',
            'unit' => 'required',
            'description' => 'nullable|min:3',
        ]);

        $subject = Subject::findOrFail($this->subject_id);
        
        $subject->subject_code = $this->subject_code;
        $subject->subject_title = $this->subject_title;
        $subject->unit = $this->unit;
        $subject->description = $this->description;
        $subject->save();

        $this->exit('Subject updated successfully');
    }

    public function deleteConfirmation(int $id)
    {
        $this->subject_id = $id;
        $this->dispatchBrowserEvent('delete-confirmation');
    }

    public function deleteSubject()
    {
        $subject = Subject::findOrFail($this->subject_id);
        $subject->delete();
        $this->dispatchBrowserEvent('success', ['message' => 'Subject deleted successfully']);
    }

    public function resetFields()
    {
        $this->subject_code = '';
        $this->subject_title = '';
        $this->unit = '';
        $this->description = '';
    }

    public function exit($message)
    {
        $this->dispatchBrowserEvent('success', ['message' => $message]);
        $this->dispatchBrowserEvent('close-modal');
        $this->resetFields();
    }
    
    public function render()
    {
        $subjects = Subject::where('subject_code', 'like','%'.$this->search.'%')->orderBy('id', 'DESC')->paginate(10);

        return view('livewire.admin.subject.subject-component', compact('subjects'))->layout('livewire.layouts.admin');
    }
}
