@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit User') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div class="mb-3">
                            <x-label for="name">Name</x-label>
                            <x-input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required />
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <x-label for="email">Email</x-label>
                            <x-input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required />
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                         
                         <!-- Roles -->
                   <div class="mb-3">
                                            <label for="role" class="form-label fw-semibold">Role</label>
                                            <select class="form-select form-select-lg" name="roles[]" id="role" multiple size="5">
                                               
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->name }}" {{$user->hasRole($role->name) ? "selected" : ""}}>{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="form-text text-muted">Hold Ctrl/Cmd to select multiple roles</div>
                    </div>
                        <!-- Optional Password -->
                        <div class="mb-3">
                            <x-label for="password">Password (leave blank to keep current)</x-label>
                            <x-input type="password" name="password" id="password" />
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <x-label for="password_confirmation">Confirm Password</x-label>
                            <x-input type="password" name="password_confirmation" id="password_confirmation" />
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-warning">Update</button>
                            <a href="{{ route('users.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
