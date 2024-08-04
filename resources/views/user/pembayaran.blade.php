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
    <div class="card">
        <div class="card-body">
            @livewire('pilihan-metode-pembayaran')
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            @livewire('upload-pembayaran')
        </div>
    </div>
@endsection
