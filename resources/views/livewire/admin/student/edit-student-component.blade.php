<div>
    {{-- Do your work, then step back. --}}
    <div class="pagetitle">
        <h1>Edit Student</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Student</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
    
      <section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card shadow">
              <div class="card-header border-0">
                    <a href="{{ route('student.index') }}" class="btn btn-primary float-end"><i class="fa-solid fa-plus"></i> Back</a>
                    <h5 class="card-title">Edit Student</h5>
              </div>
              <div class="card-body">
                <form wire:submit.prevent="updateStudent" enctype="multipart/form-data">
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
                                <label for="" class="form-label">Student Number</label>
                                <input type="text" wire:model="student_number" class="form-control">
                                @error('student_number') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="" class="form-label">Student Class</label>
                                <select wire:model="school_class_id" class="form-select">
                                    <option value="">-- Select Class --</option>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}">{{ strtoupper($class->course).'-'.strtoupper($class->year).strtoupper($class->section) }}</option>
                                    @endforeach
                                </select>
                                @error('school_class_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="" class="form-label">Birthdate</label>
                                <input type="date" id="birthdate" onchange="calculateAge()" wire:model="birthdate" class="form-control">
                                @error('birthdate') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="" class="form-label">Gender</label>
                                <select wire:model="gender" class="form-select">
                                    <option value="">-- Select Gender --</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-8 mb-3">
                                <label for="" class="form-label">Image</label>
                                <input type="file" wire:model="image" class="form-control">
                                @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label">Email</label>
                                <input type="email" wire:model="email" class="form-control">
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label">Password</label>
                                <input type="text" wire:model="password" class="form-control" placeholder="Leave empty to keep old password">
                                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                      </div>
                    <button type="submit" class="btn btn-primary w-100">Update Student</button>
                 </form>
                </div>
            </div>
    
          </div>
        </div>
    </section>
</div>
