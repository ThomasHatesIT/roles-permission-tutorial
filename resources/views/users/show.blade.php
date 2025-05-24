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
