@extends('adminlte::page')

@section('title', 'Cadastrar Usuário')

@section('content_header')
    <div align="right">
        <a href="{{ route('user.index') }}" class="btn btn-danger">Voltar</a>
    </div>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('user.store') }}" class="form" method="POST" enctype="multipart/form-data">
                @include('painel.pages.user._partials.form')
            </form>
        </div>
    </div>
@stop
