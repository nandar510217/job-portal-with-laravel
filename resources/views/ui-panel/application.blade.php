@extends('ui-panel.master')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 mt-2">
            <div class="card">
                <div class="card-header">
                    <h5>Application Form</h5>
                </div>
                <div class="card-body">
                    <h6 class="text-center float-end">Job title: {{ $job->title }}</h6>
                    <form action="{{ route('applicationstore')}}" method="post" class="mt-2">
                        @csrf
                        <label for="">Full Name</label>
                        <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control" required>
                        <label for="">Email</label>
                        <input type="email" name="email" value="{{Auth::user()->email}}" class="form-control" required>
                        <label for="">Phone</label>
                        <input type="text" name="mobile" class="form-control" required>
                        <label for="">Address</label>
                        <input type="text" name="address" class="form-control" required>
                        <label for="">Salary</label>
                        <input type="text" name="salary" value="{{$job->salary}}" class="form-control" required>

                        <input type="hidden" name="job_id" value="{{ $job->id }}">
                        <input type="hidden" name="employee_id" value="{{ Auth::user()->id }}">

                        <button type="submit" class="btn btn-sm btn-primary mt-1">Save</button>
                    </form>
                </div>
            </div>   
        </div>
        <div class="col-md-3"></div>
    </div>
</div>

@endsection