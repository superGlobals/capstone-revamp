<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="pagetitle">
        <h1>My Students / <span>BSIT-1A</span> / <span>IT-CAP02</span></h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">My Students</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
    
      <section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card shadow">
              <div class="card-header border-0">
                  <button type="button" class="btn btn-primary float-end" wire:click="showData" data-bs-toggle="modal" data-bs-target="#addTeacherClass"><i class="fa-solid fa-plus"></i> New Class</button>
                
                <h5 class="card-title">My Students </h5>
                <div class="col-md-3 py-2">
                    <input type="search" wire:model="search" class="form-control" placeholder="Search...">
                </div>

              </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card shadow border-5">

                              <a href="">
                                <div class="card-header p-1">
                                    <img src="{{ asset('uploads/user_male.jpg') }}" width="100%" height="100" alt="">
                                </div>
                                <div class="card-body">
                                    <div class="text-center text-dark mt-2">
                                        <h6 class="fw-bold text-dark">Edward Aguilar</h6>
                                        <a href="" class="btn btn-outline-danger btn-sm">Remove</a>
                                    </div>
                                </div>
                            </a>

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