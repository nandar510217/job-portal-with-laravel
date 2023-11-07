@extends('admin.layouts.app')
@section('title','job edit')
@section('content')
    <div class="card">
        <form action="{{ url('admin/jobs/' .$job->id)}}" method="post">
            @csrf @method('put')
            <div class="card-body">          
                <label for="">Title</label>
                <input type="text" name="title" value="{{$job->title}}" class="form-control mb-3 @error('title') is-invalid @enderror">
                @error('title')
                    <small class="text-danger">{{$message}}</small>
                @enderror
                <select class="form-select" aria-label="Default select example" name="category_id">
                    @foreach ($categories as $category) 
                        <option value="{{ $category->id }}" {{ $job->category_id == $category->id ? 'selected' : '' }}>                    
                        {{ $category->name }}</option>
                    @endforeach
                  </select>
                <label for="">Description</label>
                <textarea name="description" id="" rows="5" class="form-control @error('description') is-invalid @enderror">{{ $job->description }}</textarea>
                @error('description')
                    <small class="text-danger">{{$message}}</small><br>
                @enderror
                <label for="">Salary</label>
                <input type="number" value="{{ $job->salary }}" name="salary" class="form-control @error('description') is-invalid @enderror">
                @error('salary')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-primary float-right">Update</button>
            </div>
        </form>
    </div>
    
@endsection
