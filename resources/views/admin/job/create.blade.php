@extends('admin.layouts.app')
@section('title','job create')
@section('content')
    <div class="card">
        <form action="{{url('admin/jobs')}}" method="post">
            @csrf
            <div class="card-body">  
                <label for="">Category</label>
                <select class="form-select" aria-label="Default select example" name="category_id">
                    @foreach ($categories as $category) 
                        <option value="{{$category->id}}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                  <input type="hidden" name="employer_id" value="{{ Auth::user()->id }}">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control mb-3 @error('title') is-invalid @enderror">
                @error('title')
                    <small class="text-danger">{{$message}}</small>
                @enderror

                <label for="">Description</label>
                <textarea name="description" id="" rows="5" class="form-control @error('salary') is-invalid @enderror"></textarea>
                @error('description')
                    <small class="text-danger">{{$message}}</small><br>
                @enderror
                <label for="">Salary</label>
                <input type="text" name="salary" class="form-control @error('salary') is-invalid @enderror">
                @error('salary')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-primary float-right">Save</button>
            </div>
        </form>
    </div>
    
@endsection
