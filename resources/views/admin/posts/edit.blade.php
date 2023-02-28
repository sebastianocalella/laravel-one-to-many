@extends('layouts.app')

@section('content')
    @include('admin.partials.createEdit', ['method' => 'PUT', 'routeName' => 'admin.posts.update'])
@endsection