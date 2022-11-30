@extends('adminlte::page')

@section('title', 'Cadastrar Categoria')

@section('content_header')
    <div align="right">
        <a href="{{ route('category.index') }}" class="btn btn-danger"><i class="fas fa-backward"></i> Voltar</a>
    </div>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('category.store') }}" class="form" method="POST">
                @include('painel.pages.category._partials.form')
            </form>
        </div>
    </div>
@stop
