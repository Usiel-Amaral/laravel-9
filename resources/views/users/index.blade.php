@extends('layouts.app')

@section('title', 'Listagem dos usuários')

@section('content')
    <h1 class="text-2x1 font-semibold leading-tigh py-2">
        Listagem de usuários
        (<a href="{{ route('users.create') }}" class="bg-blue-900 rounded-full text-white px-4 text-sm">+</a>)
    </h1>

    <form action="{{ route('users.index') }}" method="get">
        <input class="bg-gray-200 px-2 py-2" type="text" name="search" placeholder="Pesquisar">
        <button class="shadow bg-purple-500 hover:bg-purple rounded-full px-4">Pesquisar</button>
    </form>

    <table class="min-w-full leading-normal shadow-md rounded-lg overflow-hidden">
        <thead>
            <tr>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left">
                    Nome
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left">
                    E-mail
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left">
                    Editar
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left">
                    Detalhes
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200">{{ $user->name}}</td>
                    <td class="px-5 py-5 border-b border-gray-200">{{ $user->email}}</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-gray-100 rounded-full text-center"><a href="{{ route('users.edit', $user->id)}}">Editar</a></td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-gray-100 rounded-full text-center"><a href="{{ route('users.show', $user->id)}}">Detalhes</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
