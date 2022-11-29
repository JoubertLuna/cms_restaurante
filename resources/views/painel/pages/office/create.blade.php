@extends('adminlte::page')

@section('title', 'Cadastrar Cargo')

@section('content_header')
    <div align="right">
        <a href="{{ route('office.index') }}" class="btn btn-danger"><i class="fas fa-backward"></i> Voltar</a>
    </div>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('office.store') }}" class="form" method="POST">
                @include('painel.pages.office._partials.form')
            </form>
        </div>
    </div>
@stop
