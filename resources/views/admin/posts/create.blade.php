@extends('layouts.app')

@section('content')
    @include('admin.partials.createEdit', ['method' => 'POST', 'routeName' => 'admin.posts.store'])
@endsection
