@extends('authentication::layouts.master')

@section('content')
    <h1 class="bg-yellow-500">Hello World</h1>

    <p>Module: {!! config('authentication.name') !!}</p>
@endsection
