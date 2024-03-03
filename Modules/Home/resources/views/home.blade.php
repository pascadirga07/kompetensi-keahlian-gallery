@extends('home::layouts.master')

@section('content')
@livewireScripts()
@livewireStyles()
@livewire('home.navbar')
@livewire('home.gallery')
@endsection
