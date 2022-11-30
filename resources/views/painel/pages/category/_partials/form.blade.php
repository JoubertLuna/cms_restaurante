@include('painel.includes.alerts')
@csrf
<div class="form-group">
    <h4><b>Cadastro da Categoria</b></h4>
    <hr>
    <div class="form-group">
        <label>Nome:</label>
        <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome da Categoria"
            value="{{ $category->nome ?? old('nome') }}">
    </div>

    <div class="form-group">
        <label>descrição:</label>
        <input type="text" name="descricao" id="descricao" class="form-control" placeholder="Descrição da Categoria"
            value="{{ $category->descricao ?? old('descricao') }}">
    </div>

</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Cadastrar Categoria</button>
</div>
