@extends('ui-panel.master')
@section('content')
    
    <div class="container">
        <div class="row">
            <form class="d-flex my-3" role="search" action="{{ route('search')}}" method="post">
                @csrf
                <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <div class="col-md-8">
                @foreach ($jobs as $job)
                    <div class="card mt-3">
                        <div class="card-body">
                            <h4>{{ $job->title }}</h4>
                            <p>{{ $job->description }}</p>
                            <p> $ {{ $job->salary }}</p>
                        </div>
                        <div class="card-footer bg-transparent border-0">
                                <a href="{{ route('application', $job->id)}}" class="btn btn-sm btn-info float-end">Apply</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-4 mt-3">
                @foreach($categories as $category)
                <ul>
                    <li>
                        <a href="{{ route('searchById', $category->id) }}">{{ $category->name }}</a>
                    </li>
                </ul>
                @endforeach
            </div>
        </div>
    </div>

@endsection