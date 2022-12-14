@extends('adminlte::page')

@section('title', 'CMS Restaurante')

@section('content')
<br>
    @include('painel.includes.alerts')

    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nome do Cargo</th>
                        <th>Descricão do Cargo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($offices as $office)
                        <tr>
                            <td>{{ $office->nome }}</td>
                            <td><b><i>{{ $office->descricao }}</i></b></td>

                            <td>
                                <a href="{{ route('office.show', $office->id) }}" title="Ver Cargo"><i
                                        class="fas fa-list text-warning"></i></a>

                                <a href="{{ route('office.edit', $office->id) }}" title="Editar Dados"><i
                                        class="fa fa-edit text-primary"></i></a>
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
