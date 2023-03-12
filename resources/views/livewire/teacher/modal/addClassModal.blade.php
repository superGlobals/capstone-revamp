{{-- Add Modal --}}
<div wire:ignore.self class="modal fade" id="addTeacherClass" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h5 class="modal-title" id="staticBackdropLabel">Add Class</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="resetFields" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="saveTeacherClass">
            <div class="modal-body">
                <div class="row">
                    <div class="mb-3">
                        <label for="" class="form-label">Class Name</label>
                        <select wire:model="class_id" id="" class="form-select">
                            <option value="">-- Select Class --</option>
                            @foreach ($classes as $class)
                                <option value="{{ $class->id }}">{{ strtoupper($class->course).'-'.strtoupper($class->year).strtoupper($class->section) }}</option>
                            @endforeach
                        </select>
                        @error('class_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Subject</label>
                        <select wire:model="subject_id" id="" class="form-select">
                            <option value="">-- Select Subject --</option>
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ ucwords($subject->subject_title)}} ({{($subject->subject_code) }})</option>
                            @endforeach
                        </select>
                        @error('subject_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
              </div>
              <div class="modal-footer border-0">
                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                <button type="submit" class="btn btn-primary w-100">Add Class</button>
              </div>
         </form>
        </div>
    </div>
</div>
