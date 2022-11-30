@extends('adminlte::page')

@section('title', 'CMS Restaurante')

@section('content_header')
    <a href="{{ route('banner.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Novo Banner</a>
@stop

@section('content')

    @include('painel.includes.alerts')

    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Subtitulo</th>
                        <th>Link</th>
                        <th>Imagem</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($banners as $banner)
                        <tr>
                            <td>{{ $banner->titulo }}</td>
                            <td>{{ $banner->subtitulo }}</td>
                            <td>{{ $banner->link }}</td>
                            <td align="center">
                                @if ($banner->imagem)
                                    <img src="{{ asset('storage/banners/' . $banner->imagem) }}" width="70px"
                                        alt="{{ $banner->titulo }}">
                                @else
                                    <img src="{{ asset('storage/banners/sembanner.png') }}" width="70px">
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('banner.show', $banner->id) }}" title="Ver Banner"><i
                                        class="fas fa-list text-warning"></i></a>

                                <a href="{{ route('banner.edit', $banner->id) }}" title="Editar Dados"><i
                                        class="fa fa-edit text-primary"></i></a>

                                <a href="javascript:if(confirm('Deseja realmente excluir')) {
                                          window.location.href = '{{ route('banner.excluir', $banner->id) }}' }"
                                    title="Excluir Dados">
                                    <i class="fa fa-trash text-danger"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('js')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@stop
