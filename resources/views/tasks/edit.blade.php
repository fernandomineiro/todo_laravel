@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Task</h1>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('tasks.update', $task->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Titulo</label>
            <input type="text" name="title" class="form-control" value="{{ $task->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea name="description" class="form-control">{{ $task->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Imagem</label>
            <input type="file" name="image" class="form-control">
            @if($task->image)
                <img src="{{ Storage::url($task->image) }}" alt="{{ $task->title }}" width="100" class="mt-2">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Atualizar task</button>
    </form>
</div>
@endsection