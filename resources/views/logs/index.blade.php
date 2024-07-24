@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Logs</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif 
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Usuário</th>
                <th>Ação</th>
            </tr>
        </thead> 
        <tbody>
            @forelse($logs as $log)
                <tr>
                    <td>{{ $log->user->name}}</td>
                    <td>{{ $log->action }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Nenhuma log encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection