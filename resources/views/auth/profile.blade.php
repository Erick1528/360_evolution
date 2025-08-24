@extends('layouts.index')

@section('title', 'Perfil: ' . $user->name)

@section('content')
    @auth
        <livewire:profile />
    @endauth
@endsection
