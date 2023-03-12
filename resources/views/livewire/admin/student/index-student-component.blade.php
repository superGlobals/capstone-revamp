<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="pagetitle">
        <h1>Student Page</h1>
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
                  <a href="{{ route('student.create') }}" class="btn btn-primary float-end"><i class="fa-solid fa-plus"></i> New Student</a>
                
                <h5 class="card-title">Student List</h5>
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
                    <th>Course Year & Section</th>
                    <th>Date Registered</th>
                    <th>Actions</th>
                  </thead>
                  <tbody>
                    @forelse ($students as $student)
                        <tr>
                            <td><img src="{{ Storage::url($student->image) }}" width="70" height="70" alt=""></td>
                            <td>{{ ucwords($student->first_name .' '. $student->middle_name . '. '. $student->last_name) }}</td>
                            <td>{{ $student->gender }}</td>
                            <td>{{ strtoupper($student->class->course).'-'.$student->class->year.strtoupper($student->class->section) }}</td>
                            <td>{{ \Carbon\Carbon::parse($student->created_at)->format('F d, Y h:i A') }}</td>
                            <td>
                                <a href="{{ route('student.edit', $student->id) }}" class="btn btn-success">Edit</a>
                                <a href="javascript:void(0)" wire:click.prevent="deleteConfirmation({{ $student->id }})" class="btn btn-danger">Delete</a>
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
                    {{ $students->links() }}
                </div>
              </div>
            </div>
    
          </div>
        </div>
    </section>
</div>
