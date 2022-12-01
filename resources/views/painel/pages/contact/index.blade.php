@extends('adminlte::page')

@section('title', 'CMS Restaurante')

@section('content_header')
    <a href="{{ route('contact.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Novo Fornecedor / Entregador</a>
@stop

@section('content')

    @include('painel.includes.alerts')

    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nome do Contato</th>
                        <th>E-mail</th>
                        <th>Fone</th>
                        <th>Data de Cadastro</th>
                        <th>Atualização de Cadastro</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $contact->nome }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->fone }}</td>
                            <td>{{ $contact->created_at }}</td>
                            <td>{{ $contact->updated_at }}</td>

                            <td>
                                <a href="{{ route('contact.show', $contact->id) }}" title="Ver Empresa"><i
                                        class="fas fa-list text-warning"></i></a>

                                <a href="{{ route('contact.edit', $contact->id) }}" title="Editar Dados"><i
                                        class="fa fa-edit text-primary"></i></a>

                                <a href="javascript:if(confirm('Deseja realmente excluir')) {
                                          window.location.href = '{{ route('contact.excluir', $contact->id) }}' }"
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
