@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Home') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="nav-link" href="{{ route('tasks.index') }}">{{ __('tasks') }}</a>
                    @if(auth()->user()->role === 'admin')
                    <a class="nav-link" href="{{ route('users.index') }}">{{ __('usuários') }}</a>
                    <a class="nav-link" href="{{ route('logs.index') }}">{{ __('logs') }}</a>
                    <a class="nav-link">{{ __('permissões') }}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
