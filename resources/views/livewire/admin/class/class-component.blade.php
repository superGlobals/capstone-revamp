<div>
    {{-- Do your work, then step back. --}}
    @include('livewire.admin.class.modal')
    <div class="pagetitle">
        <h1>Class Page</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Class</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
    
      <section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card shadow">
              <div class="card-header border-0">
                  <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addClassModal"><i class="fa-solid fa-plus"></i> New Class</button>
                <h5 class="card-title">Class List</h5>
                <div class="col-md-3 py-2">
                    <input type="search" wire:model="search" class="form-control" placeholder="Search...">
                </div>

              </div>
              <div class="card-body">
              <table class="table" id="myTable">
                  <thead>
                    <th>ID</th>
                    <th>Class Name</th>
                    <th>Date Registered</th>
                    <th>Actions</th>
                  </thead>
                  <tbody>
                    @forelse ($classes as $class)
                        <tr>
                            <td>{{ $class->id }}</td>
                            <td>{{ strtoupper($class->course).'-'.strtoupper($class->year).strtoupper($class->section) }}</td>
                            <td>{{ \Carbon\Carbon::parse($class->created_at)->format('F d, Y h:i A') }}</td>
                            <td>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editClassModal" wire:click="editClass({{ $class->id }})">Edit</button>
                                <a href="javascript:void(0)" class="btn btn-danger" wire:click.preven="deleteConfirmation({{ $class->id }})">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No Class Found</td>
                        </tr>
                    @endforelse
                    
                  </tbody>
                </table>
                <div>
                    {{ $classes->links() }}
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
        $('#addClassModal').modal('hide')
        $('#editClassModal').modal('hide')
    })
</script>
@endpush
