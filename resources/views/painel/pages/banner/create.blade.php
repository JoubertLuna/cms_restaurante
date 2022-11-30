@extends('adminlte::page')

@section('title', 'Cadastrar Banner')

@section('content_header')
    <div align="right">
        <a href="{{ route('banner.index') }}" class="btn btn-danger"><i class="fas fa-backward"></i> Voltar</a>
    </div>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('banner.store') }}" class="form" method="POST" enctype="multipart/form-data">
                @include('painel.pages.banner._partials.form')
            </form>
        </div>
    </div>
@stop
