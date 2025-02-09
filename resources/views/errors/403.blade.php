@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Unauthorized Access</div>
                <div class="card-body">
                    <p>You do not have permission to access this page.</p>
                    <a href="{{ route('home') }}" class="btn btn-primary">Return to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection