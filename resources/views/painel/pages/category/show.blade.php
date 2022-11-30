@extends('adminlte::page')

@section('title', 'Detalhes da Categoria')

@section('content_header')
    <div align="left">
        <h1>Detalhes da Categoria <b>{{ $category->nome }}</b></h1>
    </div>
    <div align="right">
        <a href="{{ route('category.index') }}" class="btn btn-danger"><i class="fas fa-backward"></i> Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <ul>
                        <hr>
                        <li>
                            <strong>Nome: </strong> {{ $category->nome }}
                        </li>
                        <li>
                            <strong>Descrição: </strong> {{ $category->descricao }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop
