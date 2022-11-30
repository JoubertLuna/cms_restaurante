@extends('adminlte::page')

@section('title', 'Cadastrar Blog')

@section('content_header')
    <div align="right">
        <a href="{{ route('blog.index') }}" class="btn btn-danger"><i class="fas fa-backward"></i> Voltar</a>
    </div>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('blog.store') }}" class="form" method="POST" enctype="multipart/form-data">
                @include('painel.pages.blog._partials.form')
            </form>
        </div>
    </div>
@stop
