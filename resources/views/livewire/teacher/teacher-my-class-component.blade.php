<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    @include('livewire.teacher.modal.addClassModal')
    <div class="pagetitle">
        <h1>School year: 2021-2022</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">My Class</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
    
      <section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card shadow">
              <div class="card-header border-0">
                  <button type="button" class="btn btn-primary float-end" wire:click="showData" data-bs-toggle="modal" data-bs-target="#addTeacherClass"><i class="fa-solid fa-plus"></i> New Class</button>
                
                <h5 class="card-title">My Class </h5>
                <div class="col-md-3 py-2">
                    <input type="search" wire:model="search" class="form-control" placeholder="Search...">
                </div>

              </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card shadow border-5">
                            @forelse ($teacherClass as $class)
                              <a href="{{ route('teacher.my-students', $class->id) }}">
                                <div class="card-header p-0">
                                    <img src="{{ asset('uploads/2.jpg') }}" width="100%" height="85" alt="">
                                </div>
                                <div class="card-body">
                                    <div class="text-center text-dark mt-2">
                                        <h6 class="fw-bold">{{ strtoupper($class->school_class->course).'-'.strtoupper($class->school_class->year).strtoupper($class->school_class->section) }}</h6>
                                        <h6 class="text-muted">{{ ucwords($class->subject->subject_title)}} ({{strtoupper($class->subject->subject_code) }})</h6>

                                    </div>
                                </div>
                            </a>
                            @empty
                                <h2 class="fw-bold">
                                  No Class Added
                                </h2>
                            @endforelse
                        </div>
                    </div>
                </div>
                
            </div>
    
          </div>
        </div>
    </section>
</div>

{{-- Close Modal Script --}}
@push('scripts')
<script>
    window.addEventListener('close-modal', event => {
        $('#addTeacherClass').modal('hide')
    })
</script>
@endpush