@extends('gallery::layouts.master')

@section('content')
@persist('navbar')
@livewire('home.navbar')
@endpersist()
@livewire('gallery.modalgallery', ['id' => $id])
@livewireScripts()
@endsection
