@include('painel.includes.alerts')
@csrf
<div class="form-group">
    <h4><b>Cadastro de Fornecedor / Entregador</b></h4>
    <hr>
    <div class="card-content">
        <div class="col-sm-12">
            <ul class="nav nav-tabs nav-topline" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="base-tab21" data-toggle="tab" aria-controls="tab21" href="#tab21"
                        role="tab" aria-selected="true">DADOS GERAIS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="base-tab22" data-toggle="tab" aria-controls="tab22" href="#tab22"
                        role="tab" aria-selected="false">ENDEREÇO</a>
                </li>
            </ul>
        </div>
        <div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">
            <div class="tab-pane active" id="tab21" role="tabpanel" aria-labelledby="base-tab21">
                <br>
                <div class="row skin skin-flat">
                    <div class="icheck-success d-inline ml-1">
                        <input type="checkbox" name="eh_fornecedor" id="eh_fornecedor" value="S"
                            {{ isset($contact->eh_fornecedor) && $contact->eh_fornecedor === 'S' ? 'checked' : '' }}>
                        <label>Fornecedor</label>
                    </div>

                    <div class="icheck-info d-inline ml-1">
                        <input type="checkbox" name="eh_entregador" id="eh_entregador" value="S"
                            {{ isset($contact->eh_entregador) && $contact->eh_entregador === 'S' ? 'checked' : '' }}>
                        <label>Entregador</label>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Nome:</label>
                            <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome"
                                value="{{ $contact->nome ?? old('nome') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>RG:</label>
                            <input type="text" name="rg" id="rg" class="form-control mascara-rg"
                                placeholder="Digite um RG" value="{{ $contact->rg ?? old('rg') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>CPF:</label>
                            <input type="text" name="cpf" id="cpf" class="form-control mascara-cpf"
                                placeholder="XXX.XXX.XXX-XX" value="{{ $contact->cpf ?? old('cpf') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>CNPJ:</label>
                            <input type="text" name="cnpj" id="cnpj" class="form-control mascara-cnpj"
                                placeholder="XX.XXX.XXX/0001-XX" value="{{ $contact->cnpj ?? old('cnpj') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Nome Fantasia:</label>
                            <input type="text" name="nome_fantasia" id="nome_fantasia" class="form-control"
                                placeholder="Nome Fantasia"
                                value="{{ $contact->nome_fantasia ?? old('nome_fantasia') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>E-mail:</label>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="Digite um E-mail" value="{{ $contact->email ?? old('email') }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Fone:</label>
                            <input type="text" name="fone" id="fone" class="form-control mascara-fone"
                                placeholder="(00) 0000-0000" value="{{ $contact->fone ?? old('fone') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Celular:</label>
                            <input type="text" name="celular" id="celular" class="form-control mascara-celular"
                                placeholder="(00) 00000-0000" value="{{ $contact->celular ?? old('celular') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Ativo:</label>
                            <select class="form-control select2" name="ativo" id="ativo" style="width: 100%;">
                                <option value="S"
                                    {{ old('ativo', $contact->ativo ?? '') === 'S' ? 'selected' : '' }}>
                                    Sim</option>
                                <option value="N"
                                    {{ old('ativo', $contact->ativo ?? '') === 'N' ? 'selected' : '' }}>
                                    Não</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab22" role="tabpanel" aria-labelledby="base-tab22">
                <br>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>CEP:</label>
                            <input type="text" name="cep" id="cep"
                                class="form-control mascara-cep busca_cep" placeholder="00.000-000"
                                value="{{ $contact->cep ?? old('cep') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Logradouro:</label>
                            <input type="text" name="logradouro" id="logradouro" class="form-control rua"
                                placeholder="Digite o Logradouro"
                                value="{{ $contact->logradouro ?? old('logradouro') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Bairro:</label>
                            <input type="text" name="bairro" id="bairro" class="form-control bairro"
                                placeholder="Digite o Bairro" value="{{ $contact->bairro ?? old('bairro') }}">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Número:</label>
                            <input type="text" name="numero" id="numero" class="form-control"
                                placeholder="Digite o Número" value="{{ $contact->numero ?? old('numero') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Cidade:</label>
                            <input type="text" name="cidade" id="cidade" class="form-control cidade"
                                placeholder="Digite a Cidade" value="{{ $contact->cidade ?? old('cidade') }}">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Estado:</label>
                            <input type="text" name="uf" id="uf" class="form-control estado"
                                placeholder="EX: PB" value="{{ $contact->uf ?? old('uf') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Complemento:</label>
                            <input type="text" name="complemento" id="complemento"
                                class="form-control complemento" placeholder="Digite o Complemento"
                                value="{{ $contact->complemento ?? old('complemento') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Cadastrar Fornecedor / Entregador</button>
</div>

@section('js')
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()
        })
    </script>

    <script src="{{ asset('assets/js/painel/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/painel/js.js') }}"></script>
    <script src="{{ asset('assets/js/painel/jquery.mask.js') }}"></script>
    <script src="{{ asset('assets/js/painel/componentes/js_mascara.js') }}"></script>
@stop
