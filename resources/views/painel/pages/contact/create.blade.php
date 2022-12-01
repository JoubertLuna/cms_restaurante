@extends('adminlte::page')

@section('title', 'Cadastrar Fornecedor / Entregador')

@section('content_header')
    <div align="right">
        <a href="{{ route('contact.index') }}" class="btn btn-danger"><i class="fas fa-backward"></i> Voltar</a>
    </div>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('contact.store') }}" class="form" method="POST">
                @include('painel.pages.contact._partials.form')
            </form>
        </div>
    </div>
@stop
