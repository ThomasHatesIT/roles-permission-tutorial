@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Edit Role</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('roles.update', $role->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Role Name</label>
                    <input type="text" name="name" id="name" class="form-control" 
                        value="{{ old('name', $role->name) }}" required>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Permissions</label>
                    <div class="row">
                        @foreach ($permission as $perm)
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input 
                                        class="form-check-input" 
                                        type="checkbox" 
                                        name="permissions[]" 
                                        value="{{ $perm->id }}" 
                                        id="perm_{{ $perm->id }}"
                                        {{ in_array($perm->id, old('permissions', $rolePermissions)) ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="perm_{{ $perm->id }}">
                                        {{ ucfirst($perm->name) }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>



                    
                    @error('permissions')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-4 d-flex justify-content-end gap-2">
                
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save me-1"></i> Update
                    </button>
      
                    <a href="{{ route('roles.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-1"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
