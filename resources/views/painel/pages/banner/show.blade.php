@extends('adminlte::page')

@section('title', 'Detalhes do Banner')

@section('content_header')
    <div align="left">
        <h1>Detalhes do Banner <b>{{ $banner->nome }}</b></h1>
    </div>
    <div align="right">
        <a href="{{ route('banner.index') }}" class="btn btn-danger"><i class="fas fa-backward"></i> Voltar</a>
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
                            <strong>Título: </strong> {{ $banner->titulo }}
                        </li>
                        <li>
                            <strong>Subtitulo: </strong> {{ $banner->subtitulo }}
                        </li>
                        <li>
                            <strong>Link: </strong> {{ $banner->link }}
                        </li>
                        <li>
                          <strong>Descrição: </strong> {{ $banner->descricao }}
                      </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5><b>Imagem</b></h5>
                    <hr>
                    <div class="form-group">
                        @if (@$banner->imagem)
                            <img src="{{ asset('storage/banners/' . @$banner->imagem) }}" width="250px"
                                alt="{{ @$banner->titulo }}">
                        @else
                            <img src="{{ asset('storage/banners/sembanner.png') }}" width="250px">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
