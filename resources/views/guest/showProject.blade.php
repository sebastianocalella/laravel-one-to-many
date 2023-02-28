@extends('layouts.admin')

@section('content')
    <div class="container my-5">
        <div class="card text-white bg-dark text-center">
            <div class="card-header">
                {{$project->author}}
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$project->id}} {{$project->title}}</h5>
                <div class="row align-items-center my-4">
                    @if (isset($previousProject))
                        <div class="col-2">
                            <a class="btn btn-outline-primary" href="{{route('admin.projects.show',$previousProject->slug)}}">previous</a>
                        </div>
                    @else
                        <div class="col-2">
                            <a class="btn btn-outline-secondary disabled" href="">previous</a>
                        </div>
                    @endif

                    <div class="col-8">
                        <p class="card-text">{{$project->description}}</p>
                    </div>

                    @if (isset($nextProject))
                        <div class="col-2">
                            <a class="btn btn-outline-primary" href="{{route('admin.projects.show',$nextProject->slug)}}">next</a>
                        </div>
                    @else
                        <div class="col-2">
                            <a class="btn btn-outline-secondary disabled" href="">next</a>
                        </div>
                    @endif
                </div>
                <a href="{{route('admin.projects.index')}}" class="btn btn-primary">projects list</a>
            </div>
            <div class="card-footer text-muted">
                {{$project->modification_date}}
            </div>
        </div>
    </div>
@endsection