@extends('adminlte::page')

@section('title', 'Detalhes do Fornecedor / Entregador')

@section('content_header')
    <div align="left">
        <h1>Detalhes do Contato <b>{{ $contact->nome }}</b></h1>
    </div>
    <div align="right">
        <a href="{{ route('contact.index') }}" class="btn btn-danger">Voltar</a>
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
                            <strong>Fornecedor: </strong> {{ $contact->eh_fornecedor === 'S' ? 'Sim' : 'Não' }}
                        </li>
                        <li>
                            <strong>Entregador: </strong> {{ $contact->eh_entregador === 'S' ? 'Sim' : 'Não' }}
                        </li>
                        <li>
                            <strong>Nome: </strong> {{ $contact->nome }}
                        </li>
                        <li>
                            <strong>Nome Fantasia: </strong> {{ $contact->nome_fantasia }}
                        </li>
                        <li>
                            <strong>Ativo: </strong> {{ $contact->ativo === 'S' ? 'Sim' : 'Não' }}
                        </li>
                        <li>
                            <strong>CPF: </strong> {{ $contact->cpf }}
                        </li>
                        <li>
                            <strong>RG: </strong> {{ $contact->rg }}
                        </li>
                        <li>
                            <strong>CNPJ: </strong> {{ $contact->cnpj }}
                        </li>
                        <li>
                            <strong>Data de Cadastro: </strong> {{ $contact->created_at }}
                        </li>
                        <li>
                            <strong>Data de Atualização: </strong> {{ $contact->updated_at }}
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5><b>Contatos</b></h5>
                    <hr>
                    <ul>
                        <li>
                            <strong>Telefone: </strong> {{ $contact->fone }}
                        </li>
                        <li>
                            <strong>Celular: </strong> {{ $contact->celular }}
                        </li>
                        <li>
                            <strong>E-mail: </strong> {{ $contact->email }}
                        </li>
                    </ul>
                    <h5><b>Endereço</b></h5>
                    <hr>
                    <ul>
                        <li>
                            <strong>CEP: </strong> {{ $contact->cep }}
                        </li>
                        <li>
                            <strong>Logradouro: </strong> {{ $contact->logradouro }}
                        </li>
                        <li>
                            <strong>Bairro: </strong> {{ $contact->bairro }}
                        </li>
                        <li>
                            <strong>Cidade: </strong> {{ $contact->cidade }}
                        </li>
                        <li>
                            <strong>Estado: </strong> {{ $contact->uf }}
                        </li>
                        <li>
                            <strong>Número: </strong> {{ $contact->numero }}
                        </li>
                        <li>
                            <strong>Complemento: </strong> {{ $contact->complemento }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop
