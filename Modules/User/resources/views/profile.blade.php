@extends('user::layouts.master')

@section('content')
@persist('navbar-aside')
@livewire('dashboard.navbar')
@livewire('dashboard.aside')
@endpersist
@livewire('user.profile')
@endsection
