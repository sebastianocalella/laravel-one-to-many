@extends('layouts.admin')

@section('content')
    @include('admin.types.partials.editCreateForm', ['method' => 'PUT', 'routeName' => 'admin.types.update'])
@endsection