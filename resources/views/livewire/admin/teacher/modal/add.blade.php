<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="addTeacherModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h5 class="modal-title" id="staticBackdropLabel">Add Teacher @if($image)<img src="{{ $image->temporaryUrl() }}" alt="" width="50" class="rounded-circle">@endif</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="reset_input" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="saveTeacher" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="" class="form-label">First Name</label>
                        <input type="text" wire:model="first_name" class="form-control">
                        @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="" class="form-label">Middle Name</label>
                        <input type="text" wire:model="middle_name" class="form-control">
                        @error('middle_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="" class="form-label">Last Name</label>
                        <input type="text" wire:model="last_name" class="form-control">
                        @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="" class="form-label">Birthdate</label>
                        <input type="date" id="birthdate" onchange="calculateAge()" wire:model.lazy="birthdate" class="form-control">
                        @error('birthdate') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="" class="form-label">Age</label>
                        <input type="text" wire:model.lazy="age" class="form-control">
                        @error('age') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="" class="form-label">Gender</label>
                        <select wire:model.lazy="gender" class="form-select">
                            <option value="">-- Select Gender --</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" wire:model.lazy="email" class="form-control">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="text" wire:model.lazy="password" class="form-control">
                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="" class="form-label">Image</label>
                        <input type="file" wire:model.lazy="image" class="form-control">
                        @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
              </div>
              <div class="modal-footer border-0">
                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                <button type="submit" class="btn btn-primary w-100">Add Teacher</button>
              </div>
         </form>
        </div>
    </div>
</div>