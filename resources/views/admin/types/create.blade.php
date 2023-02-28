@extends('layouts.admin')

@section('content')
    @include('admin.types.partials.editCreateForm', ['method' => 'POST', 'routeName' => 'admin.types.store'])
@endsection