@extends('adminlte::page')

@section('title', "Editar Categoria {$category->nome}")

@section('content_header')
    <div align="right">
        <a href="{{ route('category.index') }}" class="btn btn-danger"><i class="fas fa-backward"></i> Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <form action="{{ route('category.update', $category->id) }}" method="POST" class="form">
                @method('PUT')
                @include('painel.pages.category._partials.form')
            </form>
        </div>
    </div>
@stop
