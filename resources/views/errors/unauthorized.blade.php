@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-danger text-white">Unauthorized Access</div>
                <div class="card-body">
                    <h5 class="card-title">Access Denied</h5>
                    <p class="card-text">You do not have permission to access this page. Please contact your administrator if you believe this is an error.</p>
                    <a href="{{ route('home') }}" class="btn btn-primary">Return to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection