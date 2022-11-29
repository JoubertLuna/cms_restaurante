@extends('adminlte::page')

@section('title', 'CMS Restaurante')

@section('content_header')
    <a href="{{ route('table.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Nova Mesa</a>
@stop

@section('content')

    @include('painel.includes.alerts')

    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nome da Mesa</th>
                        <th>Descricão da Mesa</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tables as $table)
                        <tr>
                            <td>{{ $table->nome }}</td>
                            <td><b><i>{{ $table->descricao }}</i></b></td>

                            <td>
                                <a href="{{ route('table.show', $table->id) }}" title="Ver Mesa"><i
                                        class="fas fa-list text-warning"></i></a>

                                <a href="{{ route('table.edit', $table->id) }}" title="Editar Dados"><i
                                        class="fa fa-edit text-primary"></i></a>

                                <a href="javascript:if(confirm('Deseja realmente excluir')) {
                                          window.location.href = '{{ route('table.excluir', $table->id) }}' }"
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
