
@extends('admin.layouts.app')
@section('content')
    <div class="row">
        @if(isset($payment))
        <div class="col-md-5">
            <div class="border mt-5 rounded shadow">
                <ul class="list-group list-group-flush p-3">
                    <li class="list-group-item bg-transparent"><b>Name : {{$user->name}}</b>&nbsp;</li>
                    <div class="mb-3 mt-3 text-center">
                        <img src="{{ asset('storage/Payment-images/'.$payment->image)}}" style="width: 200px" alt="">
                    </div>
                </ul>
            </div>
        </div>
        @else
        <p>No payment yet.</p>
        @endif
        
    </div>
    <a href="{{route('user_list')}}" class="btn btn-sm btn-info float-end">
        << Back 
    </a>
@endsection