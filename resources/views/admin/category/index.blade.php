@extends('admin.layouts.app')
@section('title','category index')
@section('content')

<div class="container">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible show fade" role="alert">
        <div>{{ Session('success') }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif
    <a href="{{url('admin/categories/create')}}" class="btn btn-sm btn-primary float-right mb-3"> + Add</a>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>Actions</td>
            </tr>
        </thead>
        @foreach ($categories as $category)
            <tbody>
                <tr>
                    <td>{{ $category->id}}</td>
                    <td>{{ $category->name}}</td>
                    <td>
                        <form action="{{url('admin/categories/' .$category->id)}}" method="post">
                            @csrf @method('delete')
                            <a href="{{ url('admin/categories/' .$category->id.'/edit')}}" class="btn btn-info btn-sm">Edit</a>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        @endforeach
    </table>
</div>

@endsection
