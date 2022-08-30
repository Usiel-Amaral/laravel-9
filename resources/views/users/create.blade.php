@extends('layouts.app')

@section('title', 'Novo usuário')

@section('content')
<h1>Novo Usuário</h1>

@include('includes.validations-form')

<form action="{{ route('users.store') }}" method="post">
    {{-- @method('PUT') --}}
    @include('users._partials.form')
</form>
@endsection
