<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    @include('livewire.admin.subject.modal')
    <div class="pagetitle">
        <h1>Subject Page</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Subject</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
    
      <section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card shadow">
              <div class="card-header border-0">
                  <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addSubjectModal"><i class="fa-solid fa-plus"></i> New Subject</button>
                <h5 class="card-title">Subject List</h5>
                <div class="col-md-3 py-2">
                    <input type="search" wire:model="search" class="form-control" placeholder="Search...">
                </div>

              </div>
              <div class="card-body">
              <table class="table" id="myTable">
                  <thead>
                    <th>ID</th>
                    <th>Subject Code</th>
                    <th>Subject Title</th>
                    <th>Subject Unit</th>
                    <th>Date Registered</th>
                    <th>Actions</th>
                  </thead>
                  <tbody>
                    @forelse ($subjects as $subject)
                        <tr>
                            <td>{{ $subject->id }}</td>
                            <td>{{ strtoupper($subject->subject_code) }}</td>
                            <td>{{ strtoupper($subject->subject_title) }}</td>
                            <td>{{ $subject->unit }}</td>
                            <td>{{ \Carbon\Carbon::parse($subject->created_at)->format('F d, Y h:i A') }}</td>
                            <td>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editSubjectModal" wire:click="editSubject({{ $subject->id }})">Edit</button>
                                <a href="javascript:void(0)" class="btn btn-danger" wire:click.preven="deleteConfirmation({{ $subject->id }})">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No Subject Found</td>
                        </tr>
                    @endforelse
                  </tbody>
                </table>
                <div>
                    {{ $subjects->links() }}
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
        $('#addSubjectModal').modal('hide')
        $('#editSubjectModal').modal('hide')
    })
</script>
@endpush
</div>
