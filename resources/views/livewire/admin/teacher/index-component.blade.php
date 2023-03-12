<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="pagetitle">
        <h1>Teacher Page</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Teacher</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
    
      <section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card shadow">
              <div class="card-header border-0">
                  <a href="{{ route('teacher.create') }}" class="btn btn-primary float-end"><i class="fa-solid fa-plus"></i> New Teacher</a>
                
                <h5 class="card-title">Teacher List</h5>
                <div class="col-md-3 py-2">
                    <input type="search" wire:model="search" class="form-control" placeholder="Search...">
                </div>

              </div>
              <div class="card-body">
              <table class="table" id="myTable">
                  <thead>
                    <th>Picture</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Date Registered</th>
                    <th>Actions</th>
                  </thead>
                  <tbody>
                    @forelse ($teachers as $teacher)
                        <tr>
                            <td><img src="{{ Storage::url($teacher->image) }}" width="70" height="70" alt=""></td>
                            <td>{{ ucwords($teacher->first_name .' '. $teacher->middle_name . '. '. $teacher->last_name) }}</td>
                            <td>{{ $teacher->gender }}</td>
                            <td>{{ \Carbon\Carbon::parse($teacher->created_at)->format('F d, Y h:i A') }}</td>
                            <td>
                                <a href="{{ route('teacher.edit', $teacher->id) }}" class="btn btn-success">Edit</a>
                                <a href="javascript:void(0)" wire:click.prevent="deleteConfirmation({{ $teacher->id }})" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">No Record Found</td>
                        </tr>
                    @endforelse
                  </tbody>
                </table>
                <div>
                    {{ $teachers->links() }}
                </div>
              </div>
            </div>
    
          </div>
        </div>
    </section>
</div>
