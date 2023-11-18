@extends('auth.master')
@section('content')

    <form action="{{ route('register') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3>Register</h3>
                    </div>
                    <div class="card-body">
                        <div>
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div>
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div>
                            <label for="">Password</label>
                            <input type="text" name="password" class="form-control">
                        </div>
                        <div class="d-flex mt-2">
                            <div class="form-check me-3">
                                <input class="form-check-input" value="employee" type="radio" name="role" id="flexRadioDefault1" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                  Employee
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" value="employer" type="radio" name="role" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                  Employer
                                </label>
                              </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-primary">Register</button>
                        You have account yet? <a href="{{ route('login') }}">login</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </form>

@endsection