@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
        
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Role Details</h5>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <span class="fw-semibold text-muted">ID:</span>
                        <span class="ms-2">{{ $role->id }}</span>
                    </div>

                    <div class="mb-4">
                        <span class="fw-semibold text-muted">Name:</span>
                        <span class="ms-2">{{ $role->name }}</span>
                    </div>

                    <h6 class="fw-bold">Permissions</h6>
                    @if ($role->permissions->isEmpty())
                        <p class="text-muted">No permissions assigned.</p>
                    @else
                        <ul class="list-group mb-4">
                            @foreach ($role->permissions as $perm)
                                <li class="list-group-item d-flex align-items-center">
                                    <i class="bi bi-check-circle text-success me-2"></i>
                                    {{ $perm->name }}
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-outline-warning">
                            <i class="bi bi-pencil-square me-1"></i> Edit
                        </a>
                        <a href="{{ route('roles.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-1"></i> Back
                        </a>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
</div>
@endsection
