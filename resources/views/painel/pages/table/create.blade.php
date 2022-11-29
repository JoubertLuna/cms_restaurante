@extends('adminlte::page')

@section('title', 'Cadastrar Mesa')

@section('content_header')
    <div align="right">
        <a href="{{ route('table.index') }}" class="btn btn-danger"><i class="fas fa-backward"></i> Voltar</a>
    </div>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('table.store') }}" class="form" method="POST">
                @include('painel.pages.table._partials.form')
            </form>
        </div>
    </div>
@stop
