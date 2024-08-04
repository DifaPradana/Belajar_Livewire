@extends('layout.user-master')


@push('styles')
    @livewireStyles
@endpush

@push('scripts')
    @livewireScripts
@endpush


@section('content')
    <div class="card">
        <div class="card-body">
            @livewire('upload-berkas')
        </div>
    </div>
@endsection
