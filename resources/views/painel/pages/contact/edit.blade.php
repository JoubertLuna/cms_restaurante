@extends('adminlte::page')

@section('title', "Editar Fornecedor / Entregador {$contact->nome}")

@section('content_header')
    <div align="right">
        <a href="{{ route('contact.index') }}" class="btn btn-danger"><i class="fas fa-backward"></i> Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <form action="{{ route('contact.update', $contact->id) }}" method="POST" class="form">
                @method('PUT')
                @include('painel.pages.contact._partials.form')
            </form>
        </div>
    </div>
@stop
