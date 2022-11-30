@extends('adminlte::page')

@section('title', "Editar Blog {$blog->titulo}")

@section('content_header')
    <div align="right">
        <a href="{{ route('blog.index') }}" class="btn btn-danger"><i class="fas fa-backward"></i> Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <form action="{{ route('blog.update', $blog->id) }}" method="POST" class="form" enctype="multipart/form-data">
                @method('PUT')
                @include('painel.pages.blog._partials.form')
            </form>
        </div>
    </div>
@stop
