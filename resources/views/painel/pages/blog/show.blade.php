@extends('adminlte::page')

@section('title', 'Detalhes da Postagem')

@section('content_header')
    <div align="left">
        <h1>Detalhes da Portagem <b>{{ $blog->nome }}</b></h1>
    </div>
    <div align="right">
        <a href="{{ route('blog.index') }}" class="btn btn-danger"><i class="fas fa-backward"></i> Voltar</a>
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
                            <strong>Título: </strong> {{ $blog->titulo }}
                        </li>
                        <li>
                            <strong>URL: </strong> {{ $blog->url_titulo }}
                        </li>
                        <li>
                            <strong>Palavras: </strong> {{ $blog->palavras }}
                        </li>
                        <li>
                            @foreach ($users as $user)
                                <strong>Autor da Postagem: </strong>
                                {{ $blog->user_id === $user->id ? $user->name : '' }}
                            @endforeach

                        </li>
                        <hr>
                        <li>
                            <strong>Descrição 1: </strong> {{ $blog->descricao_1 }}
                        </li>
                        <hr>
                        <li>
                            <strong>Descrição 2: </strong> {{ $blog->descricao_2 }}
                        </li>
                        <hr>
                        <li>
                            <strong>Descrição 3: </strong> {{ $blog->descricao_3 }}
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5><b>Imagem</b></h5>
                    <hr>
                    <div class="form-group">
                        @if (@$blog->imagem)
                            <img src="{{ asset('storage/blogs/' . @$blog->imagem) }}" width="250px"
                                alt="{{ @$blog->titulo }}">
                        @else
                            <img src="{{ asset('storage/blogs/semblog.png') }}" width="250px">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
