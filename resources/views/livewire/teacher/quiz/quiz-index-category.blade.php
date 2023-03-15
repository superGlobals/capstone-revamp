<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    @include('livewire.teacher.quiz.modal.quizCategoryModal')
    <div class="pagetitle">
        <h1>Quiz Index</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Quiz</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
    
      <section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card shadow">
              <div class="card-header border-0">
                  
                  <a href="" class="btn btn-success float-end mx-2">Upload Quiz To Class</a>
                  <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addQuizCategory"><i class="fa-solid fa-plus"></i> New Quiz Category</button>
                
                <h5 class="card-title">Quiz List </h5>
                <div class="col-md-3 py-2">
                    <input type="search" wire:model="search" class="form-control" placeholder="Search...">
                </div>

              </div>
              <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Quiz Title</th>
                          <th>Quiz Description</th>
                          <th>Date Created</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($quizzes as $quiz)
                            <tr>
                              <td>{{ ucwords($quiz->quiz_title) }}</td>
                              <td>{{ ucwords($quiz->description) }}</td>
                              <td>{{ \Carbon\Carbon::parse($quiz->created_at)->format('F d, Y h:i A') }}</td>
                              <td>
                                <a href="" class="btn btn-secondary">Add Questions</a>
                                <button class="btn btn-success">Edit</button>
                                <button class="btn btn-danger">Delete</button>
                              </td>
                            </tr>
                        @empty
                            
                        @endforelse
                      </tbody>
                    </table>
                    {{ $quizzes->links() }}
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
        $('#addQuizCategory').modal('hide')
    })
</script>
@endpush