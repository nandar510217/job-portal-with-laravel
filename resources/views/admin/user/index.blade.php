@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach ($users as $user)
                    <tbody>
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->role}}</td>
                            <td>{{$user->active}}</td>
                            <td>
                                @if($user->role === 'employer')
                                <form action="{{ route('paymentConfirm', $user->id)}}" method="post">
                                    @csrf
                                    <a href="{{ route('payment_info',$user->id) }}" class="btn btn-sm btn-info">Payment Info</a>
                                    @if($user->active == 0 && $user->payment)
                                        <button type="submit" class="btn btn-sm btn-primary">Confirm</button>
                                    @endif
                                </form>
                                @endif
                            </td>
                        </tr>
                    </tbody>  
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection
