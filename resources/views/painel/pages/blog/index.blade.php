@extends('adminlte::page')

@section('title', 'CMS Restaurante')

@section('content_header')
    <a href="{{ route('blog.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Nova Postagem</a>
@stop

@section('content')

    @include('painel.includes.alerts')

    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Autor do Post</th>
                        <th>Data de Criação</th>
                        <th>Data de Edição</th>
                        <th>Imagem</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $blog)
                        <tr>
                            <td>{{ $blog->titulo }}</td>
                            @foreach ($users as $user)
                                <td>{{ $blog->user_id === $user->id ? $user->name : '' }}</td>
                            @endforeach
                            <td>{{ $blog->created_at }}</td>
                            <td>{{ $blog->updated_at }}</td>
                            <td align="center">
                                @if ($blog->imagem)
                                    <img src="{{ asset('storage/blogs/' . $blog->imagem) }}" width="70px"
                                        alt="{{ $blog->titulo }}">
                                @else
                                    <img src="{{ asset('storage/blogs/semblog.png') }}" width="70px">
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('blog.show', $blog->id) }}" title="Ver Blog"><i
                                        class="fas fa-list text-warning"></i></a>

                                <a href="{{ route('blog.edit', $blog->id) }}" title="Editar Dados"><i
                                        class="fa fa-edit text-primary"></i></a>

                                <a href="javascript:if(confirm('Deseja realmente excluir')) {
                                          window.location.href = '{{ route('blog.excluir', $blog->id) }}' }"
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
