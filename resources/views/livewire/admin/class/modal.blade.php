{{-- Add Modal --}}
<div wire:ignore.self class="modal fade" id="addClassModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h5 class="modal-title" id="staticBackdropLabel">Add Class</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="resetFields" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="saveStudentClass">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="mb-3">
                        <label for="" class="form-label">Course</label>
                        <input type="text" wire:model="course" class="form-control">
                        @error('course') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Year</label>
                        <select wire:model="year" class="form-select">
                            <option value="">-- Select Year --</option>
                            <option value="1">1st Year</option>
                            <option value="2">2nd Year</option>
                            <option value="3">3rd Year</option>
                            <option value="4">4th Year</option>
                        </select>
                        @error('year') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-0">
                        <label for="" class="form-label">Section</label>
                        <input type="text" wire:model="section" class="form-control">
                        @error('section') <span class="text-danger">{{ $message }}</span> @enderror
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


{{-- Edit Modal --}}
<div wire:ignore.self class="modal fade" id="editClassModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h5 class="modal-title" id="staticBackdropLabel">Edit Class</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="resetFields" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="updateStudentClass">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="mb-3">
                        <label for="" class="form-label">Course</label>
                        <input type="text" wire:model="course" class="form-control">
                        @error('course') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Year</label>
                        <select wire:model="year" class="form-select">
                            <option value="">-- Select Year --</option>
                            <option value="1">1st Year</option>
                            <option value="2">2nd Year</option>
                            <option value="3">3rd Year</option>
                            <option value="4">4th Year</option>
                        </select>
                        @error('year') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-0">
                        <label for="" class="form-label">Section</label>
                        <input type="text" wire:model="section" class="form-control">
                        @error('section') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
              </div>
              <div class="modal-footer border-0">
                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                <button type="submit" class="btn btn-primary w-100">Update Class</button>
              </div>
         </form>
        </div>
    </div>
</div>


