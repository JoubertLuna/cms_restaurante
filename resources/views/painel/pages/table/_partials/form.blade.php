@include('painel.includes.alerts')
@csrf
<div class="form-group">
    <h4><b>Cadastro da Mesa</b></h4>
    <hr>
    <div class="form-group">
        <label>Nome da Mesa:</label>
        <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome da Mesa"
            value="{{ $table->nome ?? old('nome') }}">
    </div>

    <div class="form-group">
        <label>descrição da Mesa:</label>
        <input type="text" name="descricao" id="descricao" class="form-control" placeholder="Descrição da Mesa"
            value="{{ $table->descricao ?? old('descricao') }}">
    </div>

</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Cadastrar Cargo</button>
</div>
