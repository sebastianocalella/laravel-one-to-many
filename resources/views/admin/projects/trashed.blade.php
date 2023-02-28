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
                    <th scope="col">
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <th scope="row">{{ $project->id }}</th>
                        <td>{{ $project->title }}</td>
                        <td class="d-flex justify-content-end">                        
                            <form class="d-inline me-4" action="{{route('admin.projects.restore', $project->slug)}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-primary">restore</button>
                            </form>
                            <form class="d-inline me-4 delete double-confirm" action="{{route('admin.projects.force-delete', $project->slug)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection