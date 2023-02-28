@extends('layouts.app')

@section('content')
    <div class="container my-5">
        @if (session('message'))
            <div class="alert alert-danger">
                <p class="text-danger">
                    {{session('message')}}
                </p>
            </div>
        @endif
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">#id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">post date</th>
                    <th scope="col">
                        <a class="btn btn-sm btn-primary w-100" href="{{route('admin.posts.create')}}">Create Post</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->author }}</td>
                        <td>{{ $post->post_date }}</td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="{{route('admin.posts.show', $post->slug)}}">Show</a>
                            <a class="btn btn-sm btn-success" href="{{route('admin.posts.edit', $post->slug)}}">Edit</a>
                            <form class="d-inline" action="{{route('admin.posts.destroy', $post->slug)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$posts->links()}}
    </div>
@endsection




