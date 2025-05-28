@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Details') }}</div>

                <div class="card-body">
                    <div class="mb-3">
                        <strong>ID:</strong> {{ $user->id }}
                    </div>

                    <div class="mb-3">
                        <strong>Name:</strong> {{ $user->name }}
                    </div>

                    <div class="mb-3">
                        <strong>Email:</strong> {{ $user->email }}
                    </div>

              <h6 class="fw-bold">Roles & Permissions</h6>

@forelse ($userRoles as $role)
    <div class="mb-3">
        <strong class="text-primary">{{ ucfirst($role->name) }}</strong>
        @if ($role->permissions->isEmpty())
            <p class="text-muted mb-0">No permissions assigned to this role.</p>
        @else
            <ul class="list-group mt-2 mb-3">
                @foreach ($role->permissions as $perm)
                    <li class="list-group-item d-flex align-items-center">
                        <i class="bi bi-check-circle text-success me-2"></i>
                        {{ $perm->name }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@empty
    <p class="text-muted">No roles assigned to this user.</p>
@endforelse


                    <div class="d-flex justify-content-end">
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning me-2">Edit</a>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
