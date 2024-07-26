@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Usuário</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif 
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Permissão</th>
            </tr>
        </thead> 
        <tbody>
            @forelse($users as $user)
            <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                        </tr>
            @empty
                <tr>
                    <td colspan="5">Nenhuma usuário encontrada.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection