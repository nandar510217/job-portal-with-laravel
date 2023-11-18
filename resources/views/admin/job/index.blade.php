@extends('admin.layouts.app')
@section('title','job index')
@section('content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible show fade" role="alert">
        <div>{{ Session('success') }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif
<a href="{{ url('admin/jobs/create')}}" class="btn btn-sm btn-primary float-right mb-3"> + Add</a>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <td>Id</td>
            <td>Title</td>
            <td>Description</td>
            <td>Salary</td>
            <td>Categories</td>
            <td>Actions</td>
        </tr>
    </thead>
    @foreach ($jobs as $job)
        <tbody>
            <tr>
                <td>{{ $job->id }}</td>
                <td>{{$job->title}}</td>
                <td>{{$job->description}}</td>
                <td>{{ $job->salary }}</td>
                <td>{{ $job->category->name }}</td>
                <td>
                    <form action="{{ url('admin/jobs/' . $job->id)}}" method="post">
                        @csrf @method('delete')
                        <a href="{{ url('admin/jobs/' .$job->id. '/edit')}}" class="btn btn-info btn-sm">Edit</a>
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                        <a href="{{ route('form', $job->id) }}" class="btn btn-sm btn-warning">Form</a>
                    </form>
                </td>
            </tr>
        </tbody>
    @endforeach
</table>

@endsection
