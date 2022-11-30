@extends('adminlte::page')

@section('title', 'Cadastrar Produto')

@section('content_header')
    <div align="right">
        <a href="{{ route('product.index') }}" class="btn btn-danger"><i class="fas fa-backward"></i> Voltar</a>
    </div>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('product.store') }}" class="form" method="POST" enctype="multipart/form-data">
                @include('painel.pages.product._partials.form')
            </form>
        </div>
    </div>
@stop
