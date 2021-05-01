@extends('templates.main')

@section('content')

    <div class="row mb-1">
        <div class="col-12">
            <h2 class="float-start">Users</h2>
            <a class="btn btn-success btn-sm float-end" href="{{ route('admin.users.create') }}" role="button">Create </a>
        </div>
    </div>

    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">#Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary btn-sm" role="button">Edit</a>
                        <button
                            type="submit"
                            class="btn btn-sm btn-danger"
                            onclick="event.preventDefault();
                            document.getElementById('delete-user-form-{{ $user->id }}').submit()"
                            >
                            Delete
                        </button>
                        <form
                            id="delete-user-form-{{ $user->id }}"
                            action="{{ route('admin.users.destroy', $user->id) }}"
                            method="POST"
                            style="display: none"
                        >
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}

@endsection
