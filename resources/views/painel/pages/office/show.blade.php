@extends('adminlte::page')

@section('title', 'Detalhes do Cargo')

@section('content_header')
    <div align="left">
        <h1>Detalhes do Cargo <b>{{ $office->nome }}</b></h1>
    </div>
    <div align="right">
        <a href="{{ route('office.index') }}" class="btn btn-danger"><i class="fas fa-backward"></i> Voltar</a>
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
                            <strong>Nome: </strong> {{ $office->nome }}
                        </li>
                        <li>
                            <strong>Descrição: </strong> {{ $office->descricao }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop
