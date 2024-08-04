@extends('layout.user-master')

@push('styles')
    @livewireStyles
@endpush

@push('scripts')
    @livewireScripts
@endpush

@section('content')
    @if (session('error'))
        <div class="card-body p-4">
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        </div>
    @endif
    @livewire('dashboard-user')
@endsection
