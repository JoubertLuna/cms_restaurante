@extends('adminlte::page')

@section('title', 'Detalhes do Financeiro')

@section('content_header')
    <div align="left">
        <h1>Detalhes do Financeiro <b>{{ $user->name }}</b></h1>
    </div>
    <div align="right">
        <a href="{{ route('finance.index') }}" class="btn btn-danger"><i class="fas fa-backward"></i> Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5><b>Dados Gerais</b></h5>
                    <hr>
                    <ul>
                        <li>
                            <strong>Nome: </strong> {{ $user->name }}
                        </li>
                        <li>
                            <strong>E-mail: </strong> {{ $user->email }}
                        </li>
                        <li><strong>Cargo: </strong>
                            @foreach ($offices as $office)
                                {{ $office->id === $user->office_id ? $office->nome : '' }}
                            @endforeach
                        </li>
                        <li>
                            <strong>Fone: </strong> {{ $user->fone }}
                        </li>
                        <li>
                            <strong>Celular: </strong> {{ $user->celular }}
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5><b>Endereço</b></h5>
                    <hr>
                    <ul>
                        <li>
                            <strong>CEP: </strong> {{ $user->cep }}
                        </li>
                        <li>
                            <strong>Logradouro: </strong> {{ $user->logradouro }}
                        </li>
                        <li>
                            <strong>Bairro: </strong> {{ $user->bairro }}
                        </li>
                        <li>
                            <strong>Cidade: </strong> {{ $user->cidade }}
                        </li>
                        <li>
                            <strong>Estado: </strong> {{ $user->uf }}
                        </li>
                        <li>
                            <strong>Número: </strong> {{ $user->numero }}
                        </li>
                        <li>
                            <strong>Complemento: </strong> {{ $user->complemento }}
                        </li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="row">
                <div align="center" class="col-md-12">
                    <h5><b>Imagem</b></h5>
                    <div class="form-group">
                        @if (@$user->image)
                            <img src="{{ asset('storage/users/' . @$user->image) }}" width="250px"
                                alt="{{ @$user->name }}">
                        @else
                            <img src="{{ asset('storage/users/semperfil.jpg') }}" width="250px">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@stop
