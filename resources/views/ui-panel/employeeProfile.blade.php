@extends('ui-panel.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                {{-- user profile --}}
                
                <div class="border rounded shadow mt-4">
                    <h5 class="text-center text-secondary-emphasis ">User Profile</h5>
                    <ul class="list-group list-group-flush p-3">
                        <div class="d-flex justify-content-between mb-3">
                                
                                    <ul class="list-group list-group-flush p-3">
                                        <div class="mb-3 text-center">
                                            @if($user->image)
                                                <img src="{{ asset('storage/images/'.$user->image) }}" alt="404" id="profileImage" class="w-50 h-70 object-fit-cover rounded shadow-sm">
                                            @else
                                                <p class="text-primary"><b>No photo available !</b></p>
                                            @endif
                                        </div>
                            
                                        <li class="list-group-item"><b>Name :</b>&nbsp; {{$user->name}}</li>
                                        <li class="list-group-item"><b>Email :</b>&nbsp; {{$user->email}}</li>
                                        <li class="list-group-item"><b>Role :</b>&nbsp; {{$user->role}}</li>
                                        <li class="list-group-item">
                                            <button type="button" class="btn btn-sm btn-info float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                @if($user->image)
                                                    Update
                                                @else
                                                    Upload
                                                @endif
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                            
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Image</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{route('registerUpdate', Auth::user()->id)}}" method="POST" enctype="multipart/form-data"> @csrf
                                    <div class="modal-body">
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                    <div class="modal-footer">     
                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary btn-sm">Upload</button>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>

                          

                
{{-- 
            <div class="col-md-7">
                message
                <h4 class="mt-3 text-center">Messages</h4>     
                @foreach ($message as $showmessage)
                        <div class="card mt-2 green ">
                            <h5 class="card-header">Company Name: {{ $showmessage->employer->name }}</h5>
                            <div class="card-body">
                            <h6 class="card-title">{{ $showmessage->job->title }}</h6>
                            <p class="card-text">{{ $showmessage->message }}</p>
                            <div class="float-end">{{ $showmessage->created_at}}</div>
                            </div>
                        </div>
                @endforeach 
            </div> --}}

            
            <div class="col-md-7">
                <h5 class="text-center mb-5 text-decoration-underline">Message</h5>
                @if ($messages->count() > 0)
                    @foreach ($messages as $message)
                        <ul class="list-group list-group-flush p-3 mb-3 border rounded shadow @if ($message->accept == '1') border-success @else border-danger  @endif">
                            <li class="list-group-item"><b>Company :</b>&nbsp; {{$message->employer->name}}</li>

                            <li class="list-group-item">
                                <b>Job Title :</b>&nbsp; {{ optional($message->job)->title }}
                            </li>
                              
                            <li class="list-group-item"><b>Salary :</b>&nbsp; {{ optional($message->job)->salary }}</li>
                            {{-- <li class="list-group-item"><b>Job Title :</b>&nbsp; {{$message->job->title}}</li>
                            <li class="list-group-item"><b>Salary :</b>&nbsp; {{$message->job->salary}}</li> --}}
                            <li class="list-group-item fw-bold {{$message->accept == 1 ? 'text-success' : 'text-danger'}}"><b class="text-dark fw-bold">Message :</b>&nbsp; {{$message->message}}</li>
                            <li class="list-group-item"><b>Date :</b>&nbsp; {{date('d-M-Y', strtotime($message->created_at))}}</li>
                            <li class="list-group-item">
                                <div class="float-end 
                                    @if( $message->accept == 1) text-success @else text-danger  @endif">
                                    <b>{{$message->accept == 1 ? 'Accepted' : 'Rejected'}}</b>
                                </div>
                            </li>
                        </ul>
                    @endforeach
                @else 
                    <p class="text-center mt-5 fw-bold ">No message found !</p>
                @endif
            </div>
    
        </div>      
    </div>
@endsection







