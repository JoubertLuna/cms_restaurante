@extends('adminlte::page')

@section('title', 'Detalhes do Produto')

@section('content_header')
    <div align="left">
        <h1>Detalhes do Produto <b>{{ $product->nome }}</b></h1>
    </div>
    <div align="right">
        <a href="{{ route('product.index') }}" class="btn btn-danger"><i class="fas fa-backward"></i> Voltar</a>
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
                            <strong>Produto: </strong> {{ $product->produto }}
                        </li>
                        <li>
                            <strong>É Produto: </strong> {{ $product->eh_produto === 'S' ? 'Sim' : 'Não' }}
                        </li>
                        <li>
                            <strong>É Insumo: </strong> {{ $product->eh_insumo === 'S' ? 'Sim' : 'Não' }}
                        </li>
                        <li>
                            <strong>Preço: </strong> R$ {{ number_format($product->preco, 2, ',', '.') }}
                        </li>
                        <li>
                            <strong>Ativo: </strong> {{ $product->ativo === 'S' ? 'Sim' : 'Não' }}
                        </li>
                        <li><strong>Categoria: </strong>
                            @foreach ($categories as $category)
                                {{ $category->id === $product->category_id ? $category->nome : '' }}
                            @endforeach
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5><b>Imagem</b></h5>
                    <hr>
                    <div class="form-group">
                        @if (@$product->imagem)
                            <img src="{{ asset('storage/products/' . @$product->imagem) }}" width="250px"
                                alt="{{ @$product->produto }}">
                        @else
                            <img src="{{ asset('storage/products/semproduto.png') }}" width="250px">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
