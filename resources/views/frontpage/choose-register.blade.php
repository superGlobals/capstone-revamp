@extends('frontpage.layout.app')

@section('content')
    <div class="row">
        <div class="col-md-5 mx-auto mt-5">
            <div class="card shadow border-0 rounded p-3">
                <div class="card-header border-0 bg-white">
                    <img src="{{ asset('uploads/poclogo1.png') }}" alt="" width="50">
                    <h4 class="card-title mt-3">
                        New to POC LMS?
                    </h4>
                </div>
                <div class="card-body">
                    <div class="mb-3 d-block">
                        <a href="{{ route('register.teacher') }}" class="btn btn-primary fs-5 w-100">I'm a Teacher</a>
                    </div>
                    <div class="mb-5 d-block">
                        <a href="{{ route('register.student') }}" class="btn btn-outline-warning fs-5 w-100">I'm a Student</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection