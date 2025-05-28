@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Roles List</h3>
        @can('role-create')
            
     
        <a href="{{ route('roles.create') }}" class="btn btn-primary">Add Role</a>
           @endcan
    </div>

    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
             
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                     
                    <td>
                        <a href="/roles/{{$role->id}}" class="btn btn-info btn-sm">Show</a>
                        @can('role-edit')
                        <a href="/roles/{{$role->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                           @endcan  
                             @can('role-delete')
                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this product?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                             @endcan  
                        </form>
                    </td>
                   
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
