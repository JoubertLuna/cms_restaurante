@include('painel.includes.alerts')
@csrf
<div class="form-group">
    <h4><b>Cadastro de Produto</b></h4>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nome do Produto:</label>
                <input type="text" name="produto" id="produto" class="form-control" placeholder="Nome do Produto"
                    value="{{ $product->produto ?? old('produto') }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Preço:</label>
                <input type="text" name="preco" id="preco" class="form-control" placeholder="EX: 1000"
                    value="{{ $product->preco ?? old('cep') }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label>Categoria:</label>
                <select class="form-control select2" name="category_id" id="category_id" style="width: 100%;">
                    @foreach ($categories as $category)
                        @if ($category->id === @$product->category_id)
                            <option value="{{ $category->id }}" selected>{{ $category->nome }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->nome }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>É Produto:</label>
                <select class="form-control select2" name="eh_produto" id="eh_produto" style="width: 100%;">
                    <option value="S"
                        {{ old('eh_produto', $product->eh_produto ?? '') === 'S' ? 'selected' : '' }}>
                        Sim</option>
                    <option value="N"
                        {{ old('eh_produto', $product->eh_produto ?? '') === 'N' ? 'selected' : '' }}>
                        Não</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>É Insumo:</label>
                <select class="form-control select2" name="eh_insumo" id="eh_insumo" style="width: 100%;">
                    <option value="S" {{ old('eh_insumo', $product->eh_insumo ?? '') === 'S' ? 'selected' : '' }}>
                        Sim</option>
                    <option value="N" {{ old('eh_insumo', $product->eh_insumo ?? '') === 'N' ? 'selected' : '' }}>
                        Não</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Ativo:</label>
                <select class="form-control select2" name="ativo" id="ativo" style="width: 100%;">
                    <option value="S" {{ old('ativo', $product->ativo ?? '') === 'S' ? 'selected' : '' }}>
                        Sim</option>
                    <option value="N" {{ old('ativo', $product->ativo ?? '') === 'N' ? 'selected' : '' }}>
                        Não</option>
                </select>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-7">
            <div class="btn-group w-100">
                <span class="btn btn-success col fileinput-button">
                    <span>
                        <input type="file" name="imagem" id="imagem" class="form-control-file"
                            onchange="pegaArquivo(this.files)" value="{{ $product->imagem ?? old('imagem') }}">
                    </span>
                </span>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                @if (@$product->imagem)
                    <img src="{{ asset('storage/products/' . @$product->imagem) }}" width="200px"
                        alt="{{ @$product->produto }}" id="imgup">
                @else
                    <img src="{{ asset('storage/products/semproduto.png') }}" width="200px" id="imgup">
                @endif
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-danger"><i class="fas fa-save"></i> Cadastrar Produto</button>
</div>

@section('js')
    <script>
        function pegaArquivo(files) {
            var file = files[0];
            const fileReader = new FileReader();
            fileReader.onloadend = function() {
                $("#imgup").attr("src", fileReader.result);
            }
            fileReader.readAsDataURL(file);
        }
    </script>

    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()
        })
    </script>
@stop
