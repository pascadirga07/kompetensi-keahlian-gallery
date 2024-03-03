@extends('user::layouts.master')

@section('content')
    @livewireStyles
    @livewire('dashboard.navbar')
    @livewire('dashboard.aside')
    @livewire('user.datatableuser')
    @livewireScripts
@endsection
