@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <form action="{{url('admin/categories/' .$category->id)}}" method="post">
            @csrf @method('PUT')
            <div class="card-body">          
                <label for="">Name</label>
                <input type="text" name="name" value="{{ $category->name}}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-primary float-right" onclick="return confirm('Are you sure you want to delete?')">Update</button>
            </div>
        </form>
    </div>
    
@endsection
