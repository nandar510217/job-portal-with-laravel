@extends('admin.layouts.app')
@section('title','job create')
@section('content')
    <div class="card">
        <form action="{{url('admin/jobs')}}" method="post">
            @csrf
            <div class="card-body">          
                <label for="">Title</label>
                <input type="text" name="title" class="form-control mb-3 @error('title') is-invalid @enderror">
                @error('title')
                    <small class="text-danger">{{$message}}</small>
                @enderror
                <select class="form-select" aria-label="Default select example" name="category_id">
                    @foreach ($categories as $category) 
                        <option value="{{$category->id}}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                <label for="">Description</label>
                <textarea name="description" id="" rows="5" class="form-control"></textarea>
                @error('description')
                    <small class="text-danger">{{$message}}</small>
                @enderror
                <label for="">Salary</label>
                <input type="number" name="salary" class="form-control @error('description') is-invalid @enderror">
                @error('description')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-primary float-right">Save</button>
            </div>
        </form>
    </div>
    
@endsection
