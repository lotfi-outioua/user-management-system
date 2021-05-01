@extends('templates.main')

@section('content')

    <h1 class="my-5">Create new user</h1>

    <form method="POST" action="{{ route('admin.users.store') }}">
        @method('POST')
        @include('admin.users.templates.form', ['create' => true])
    </form>

@endsection
