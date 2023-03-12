<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="row">
        <div class="col-md-5 mx-auto mt-5">
            <div class="card shadow border-0 rounded p-3">
                <div class="card-header border-0 bg-white">
                    <img src="{{ asset('uploads/poclogo1.png') }}" alt="" width="50">
                    <h4 class="card-title mt-3">
                        Student Registration
                    </h4>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="studentRegister">
                        <div class="mb-3">
                            <label class="form-label" for="">First Name</label>
                            <input type="text" wire:model="first_name" class="form-control">
                            @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">Midlle Name</label>
                            <input type="text" wire:model="middle_name" class="form-control">
                            @error('middle_name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">Last Name</label>
                            <input type="text" wire:model="last_name" class="form-control">
                            @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">Email</label>
                            <input type="email" wire:model="email" class="form-control">
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">Class</label>
                            <select wire:model="school_class_id" id="" class="form-select">
                                <option value="">-- Select Your Class --</option>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}">{{ strtoupper($class->course).'-'.strtoupper($class->year).strtoupper($class->section) }}</option>
                                    @endforeach
                            </select>
                            @error('school_class_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">Student Number</label>
                            <input type="text" wire:model="student_number" class="form-control">
                            @error('student_number') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">Password</label>
                            <input type="text" wire:model="password" class="form-control">
                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
