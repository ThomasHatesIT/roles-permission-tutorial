@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>{{ __('Users') }}</span>
            
                    <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">Create User</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
   <!-- ✅ Show logged-in user's name -->
                    <div class="mb-3 text-end">
                        <span class="text-muted">Logged in as: <strong>{{ Auth::user()->name }}</strong></span>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                    <th>Roles</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                        @foreach ($user->getRoleNames() as $role )
                            <button class="btn btn-success btn-sm">{{$role}}</button>
                        @endforeach
                     </td>
                                    <td>
                                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm">Show</a>
                                
                                            
                         
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                            @csrf
                                            @method('DELETE')
                                            @can('user-delete')
                                                
                                         
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                               @endcan
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
