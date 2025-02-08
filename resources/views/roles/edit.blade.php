@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Role</h1>
    <form action="{{ route('roles.update', $role) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Role Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $role->name }}" required>
        </div>
        <div class="mb-3">
            <label for="permissions" class="form-label">Assign Permissions</label>
            <select name="permissions[]" id="permissions" class="form-control" multiple required>
                @foreach($permissions as $permission)
                <option value="{{ $permission->id }}" @if($role->permissions->contains($permission->id)) selected @endif>
                    {{ $permission->name }}
                </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
