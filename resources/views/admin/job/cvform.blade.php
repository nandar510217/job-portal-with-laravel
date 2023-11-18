@extends('admin.layouts.app')
@section('content')
    <div class="container">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible show fade" role="alert">
            <div>{{ Session('success') }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
@endif
        <div>
            <a href="{{ url('admin/jobs')}}" class="btn btn-sm btn-primary float-end mb-3"><< Back</a>
        </div>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Salary</th>
                    <th>Actions</th>
                </tr>
            </thead>
            @foreach ($job->applications as $formData)
            <tbody>
                <tr>
                    <td>{{ $formData->id}}</td>
                    <td>{{ $formData->name}}</td>
                    <td>{{ $formData->email}}</td>
                    <td>{{ $formData->mobile}}</td>
                    <td>{{ $formData->address}}</td>
                    <td>{{ $formData->salary}}</td>
                    <td>
                        <form method="post">
                            @csrf
                            <input type="hidden" name="job_id" value="{{$formData->job_id}}">
                            <input type="hidden" name="employer_id" value="{{Auth::user()->id}}">
                            <input type="hidden" name="employee_id" value="{{$formData->employee_id}}">
                            <input type="hidden" name="accept" value="0">

                            <button type="button" class="btn btn-sm btn-success @if($formData) 
                            @if($formData->accept == '1') d-none @endif
                            @endif" data-bs-toggle="modal" data-bs-target="#acceptModal{{ $formData->id}}">
                                
                                Accept
                            </button>
                            <button formaction = "{{ route('application.reject', $formData->id) }}" class="btn btn-sm btn-danger   @if($formData) 
                                @if($formData->accept == '0') d-none @endif
                            @endif"> 
                                Reject
                            </button>
                        </form>
                        
                    </td>
                </tr>
            </tbody>

            <!-- Button trigger modal -->
            
            
            <!-- Modal -->
            <div class="modal fade" id="acceptModal{{ $formData->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('application.accept',  $formData->id)}}" method="post">
                            @csrf
                            <input type="hidden" name="job_id" value="{{$formData->job_id}}">
                            <input type="hidden" name="employer_id" value="{{Auth::user()->id}}">
                            <input type="hidden" name="employee_id" value="{{$formData->employee_id}}">

                            <textarea name="message" id="" rows="5" class="form-control" required placeholder="Message"></textarea>

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Send</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>

            @endforeach
        </table>
    </div>  
@endsection