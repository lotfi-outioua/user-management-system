@extends('templates.main')

@section('content')

    <h1 class="my-5">Edit user</h1>

    <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
        @method('PATCH')
        @include('admin.users.templates.form')
    </form>

@endsection
