@extends('layouts.admin')

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
                    <th scope="col">last modification</th>
                    <th class="text-center" scope="col">
                        <a class="btn btn-sm btn-primary w-100" href="{{route('admin.projects.create')}}"><i class="fa-solid fa-plus"></i> Create new element</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <th scope="row">{{ $project->id }}</th>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->author }}</td>
                        <td>{{ $project->modification_date }}</td>
                        <td class="d-flex justify-content-between px-5">
                            <a class="btn btn-sm btn-primary" href="{{route('admin.projects.show', $project->slug)}}"><i class="fa-solid fa-eye"></i></a>
                            <a class="btn btn-sm btn-success" href="{{route('admin.projects.edit', $project->slug)}}"><i class="fa-solid fa-pencil"></i></a>
                            <form class="d-inline" action="{{route('admin.projects.destroy', $project->slug)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$projects->links()}}
    </div>
@endsection