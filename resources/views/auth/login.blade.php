@extends('auth.master')
@section('content')

    <form action="{{ route('login')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3>Login</h3>
                    </div>
                    <div class="card-body">
                        <div>
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div>
                            <label for="">Password</label>
                            <input type="text" name="password" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-primary">Login</button>
                        You have no account yet? <a href="{{ route('register') }}"class="text-danger">register</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </form>

@endsection