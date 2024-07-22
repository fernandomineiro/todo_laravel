@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tasks</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Criar task</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Descrição</th>
                <th>Imagem</th>
                <th>Completo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>
                        @if($task->image)
                            <img src="{{ Storage::url($task->image) }}" alt="{{ $task->title }}" width="50">
                        @endif
                    </td>
                    <td>{{ $task->completed ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-secondary">Editar</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                        @if(!$task->completed)
                            <form action="{{ route('tasks.complete', $task->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success">Completo</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Nenhuma task encontrada.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection