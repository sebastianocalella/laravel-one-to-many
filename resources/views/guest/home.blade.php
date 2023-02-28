@extends('layouts.admin')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-around">
            @foreach ($projects as $project)
                <div class="col-5 card my-3 text-white bg-dark text-center">
                    <div class="card-header text-end">
                        <span class="text-secondary">Author: </span>{{$project->author}}
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">{{$project->id}} {{$project->title}}</h4>
                        <p class="card-text py-2">{{$project->description}}</p>
                    </div>
                    <div class="card-footer text-muted">
                        {{$project->modification_date}}
                        <a class="btn btn-primary ms-5" href="{{route('guest.projects.show', $project->slug)}}">Show</a>
                    </div>
                </div>
            @endforeach
        </div>
        {{$projects->links()}}
    </div>
@endsection