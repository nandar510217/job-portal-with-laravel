@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <form action="{{url('admin/categories')}}" method="post">
            @csrf
            <div class="card-body">          
                <label for="">Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="card-footer clearfix">
                <button type="submit" class="btn btn-sm btn-primary float-end">Save</button>
            </div>
        </form>
    </div>
    
@endsection
