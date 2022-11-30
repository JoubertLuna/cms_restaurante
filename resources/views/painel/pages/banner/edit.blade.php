@extends('adminlte::page')

@section('title', "Editar Banner {$banner->titulo}")

@section('content_header')
    <div align="right">
        <a href="{{ route('banner.index') }}" class="btn btn-danger"><i class="fas fa-backward"></i> Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <form action="{{ route('banner.update', $banner->id) }}" method="POST" class="form" enctype="multipart/form-data">
                @method('PUT')
                @include('painel.pages.banner._partials.form')
            </form>
        </div>
    </div>
@stop
