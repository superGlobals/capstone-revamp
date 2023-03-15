{{-- Add Modal --}}
<div wire:ignore.self class="modal fade" id="addQuizCategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h5 class="modal-title" id="staticBackdropLabel">Add Quiz Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="resetFields" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="storeQuizCategory">
            <div class="modal-body">
                <div class="row">
                    <div class="mb-3">
                        <label for="" class="form-label">Quiz Title</label>
                        <input type="text" wire:model="quiz_title" class="form-control">
                        @error('quiz_title') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Quiz Description</label>
                        <textarea wire:model="description" class="form-control"></textarea>
                        @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
              </div>
              <div class="modal-footer border-0">
                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                <button type="submit" class="btn btn-primary w-100">Add Quiz Category</button>
              </div>
         </form>
        </div>
    </div>
</div>
