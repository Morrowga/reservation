@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12 mt-5">
        <div class="d-flex justify-content-center row">
            @if(Auth::user()->role === 'hotel_manager')
            <div class="col">
                <a href="{{ route('user') }}" class="text">
                    <div class="card card-panel">
                        <div class="card-body">
                            <p class="text-head">User Management</p>
                            <i class="fas fa-users-cog fa-5x icon-panel"></i>
                        </div>
                    </div>
                </a>
            </div>
            @endif
            <div class="col">
                <a href="{{ Route('lists') }}" class="text">
                    <div class="card card-panel">
                        <div class="card-body">
                            <p class="text-head">Reservations</p>
                            <i class="fas fa-concierge-bell fa-5x icon-panel"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
