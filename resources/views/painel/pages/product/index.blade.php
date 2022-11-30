@extends('adminlte::page')

@section('title', 'CMS Restaurante')

@section('content_header')
    <a href="{{ route('product.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Novo Produto</a>
@stop

@section('content')

    @include('painel.includes.alerts')

    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Imagem do Produto</th>
                        <th>Nome do Produto</th>
                        <th>Preço do Produto</th>
                        <th>Ativo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td align="center">
                                @if ($product->imagem)
                                    <img src="{{ asset('storage/products/' . $product->imagem) }}" width="70px"
                                        alt="{{ $product->produto }}">
                                @else
                                    <img src="{{ asset('storage/products/semproduto.png') }}" width="70px">
                                @endif
                            </td>
                            <td>{{ $product->produto }}</td>
                            <td>R$ {{ number_format($product->preco, 2, ',', '.') }}</td>
                            <td>{{ $product->ativo === 'S' ? 'Sim' : 'Não' }}</td>

                            <td>
                                <a href="{{ route('product.show', $product->id) }}" title="Ver Empresa"><i
                                        class="fas fa-list text-warning"></i></a>

                                <a href="{{ route('product.edit', $product->id) }}" title="Editar Dados"><i
                                        class="fa fa-edit text-primary"></i></a>

                                <a href="javascript:if(confirm('Deseja realmente excluir')) {
                                          window.location.href = '{{ route('product.excluir', $product->id) }}' }"
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
