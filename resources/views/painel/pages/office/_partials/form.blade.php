@include('painel.includes.alerts')
@csrf
<div class="form-group">
    <h4><b>Cadastro do Cargo</b></h4>
    <hr>
    <div class="form-group">
        <label>Nome da Cargo:</label>
        <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome do Cargo"
            value="{{ $office->nome ?? old('nome') }}">
    </div>

    <div class="form-group">
        <label>descrição:</label>
        <input type="text" name="descricao" id="descricao" class="form-control" placeholder="Descrição da Cargo"
            value="{{ $office->descricao ?? old('descricao') }}">
    </div>

</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Cadastrar Mesa</button>
</div>
