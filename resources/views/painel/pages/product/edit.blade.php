@extends('adminlte::page')

@section('title', "Editar Produto {$product->produto}")

@section('content_header')
    <div align="right">
        <a href="{{ route('product.index') }}" class="btn btn-danger"><i class="fas fa-backward"></i> Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <form action="{{ route('product.update', $product->id) }}" method="POST" class="form" enctype="multipart/form-data">
                @method('PUT')
                @include('painel.pages.product._partials.form')
            </form>
        </div>
    </div>
@stop
