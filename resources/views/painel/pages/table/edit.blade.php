@extends('adminlte::page')

@section('title', "Editar Mesa {$table->nome}")

@section('content_header')
    <div align="right">
        <a href="{{ route('table.index') }}" class="btn btn-danger"><i class="fas fa-backward"></i> Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <form action="{{ route('table.update', $table->id) }}" method="POST" class="form">
                @method('PUT')
                @include('painel.pages.table._partials.form')
            </form>
        </div>
    </div>
@stop
