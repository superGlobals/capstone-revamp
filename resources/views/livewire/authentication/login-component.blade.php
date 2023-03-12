<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="row">
        <div class="col-md-5 mx-auto mt-5">
            <div class="card shadow border-0 rounded p-3">
                <div class="card-header border-0 bg-white">
                    <img src="{{ asset('uploads/poclogo1.png') }}" alt="" width="50">
                    <h4 class="card-title mt-3">
                        Login
                    </h4>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="login">
                        <div class="mb-3">
                            <label class="form-label" for="">Email</label>
                            <input type="email" wire:model="email" class="form-control">
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">Password</label>
                            <input type="text" wire:model="password" class="form-control">
                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
