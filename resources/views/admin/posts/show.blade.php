@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="card text-white bg-dark text-center">
            <div class="card-header">
                {{$post->author}}
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$post->id}} {{$post->title}}</h5>
                <div class="row align-items-center my-4">
                    @if (isset($previousPost))
                        <div class="col-2">
                            <a class="btn btn-outline-primary" href="{{route('admin.posts.show',$previousPost->slug)}}">previous</a>
                        </div>
                    @else
                        <div class="col-2">
                            <a class="btn btn-outline-secondary disabled" href="">previous</a>
                        </div>
                    @endif

                    <div class="col-8">
                        <p class="card-text">{{$post->content}}</p>
                    </div>

                    @if (isset($nextPost))
                        <div class="col-2">
                            <a class="btn btn-outline-primary" href="{{route('admin.posts.show',$nextPost->slug)}}">next</a>
                        </div>
                    @else
                        <div class="col-2">
                            <a class="btn btn-outline-secondary disabled" href="">next</a>
                        </div>
                    @endif
                </div>
                <a href="{{route('admin.posts.index')}}" class="btn btn-primary">posts list</a>
            </div>
            <div class="card-footer text-muted">
                {{$post->post_date}}
            </div>
        </div>
    </div>
@endsection
