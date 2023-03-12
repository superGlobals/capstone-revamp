{{-- Add Modal --}}
<div wire:ignore.self class="modal fade" id="addSubjectModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h5 class="modal-title" id="staticBackdropLabel">Add Subject</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="resetFields" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="saveSubjectClass">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="mb-3">
                        <label for="" class="form-label">Subject Code</label>
                        <input type="text" wire:model="subject_code" class="form-control">
                        @error('subject_code') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Subject Title</label>
                        <input type="text" wire:model="subject_title" class="form-control">
                        @error('subject_title') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Subject Unit</label>
                        <input type="number" wire:model="unit" class="form-control">
                        @error('unit') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-0">
                        <label for="" class="form-label">Desciption</label>
                        <textarea wire:model="description" class="form-control" placeholder="(Optional)"></textarea>
                        @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
              </div>
              <div class="modal-footer border-0">
                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                <button type="submit" class="btn btn-primary w-100">Add Subject</button>
              </div>
         </form>
        </div>
    </div>
</div>


{{-- Edit Modal --}}
<div wire:ignore.self class="modal fade" id="editSubjectModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h5 class="modal-title" id="staticBackdropLabel">Edit Subject</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="resetFields" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="updateSubject">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="mb-3">
                        <label for="" class="form-label">Subject Code</label>
                        <input type="text" wire:model="subject_code" class="form-control">
                        @error('subject_code') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Subject Title</label>
                        <input type="text" wire:model="subject_title" class="form-control">
                        @error('subject_title') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Subject Unit</label>
                        <input type="number" wire:model="unit" class="form-control">
                        @error('unit') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-0">
                        <label for="" class="form-label">Desciption</label>
                        <textarea wire:model="description" class="form-control" placeholder="(Optional)"></textarea>
                        @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
              </div>
              <div class="modal-footer border-0">
                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                <button type="submit" class="btn btn-primary w-100">Update Subject</button>
              </div>
         </form>
        </div>
    </div>
</div>
