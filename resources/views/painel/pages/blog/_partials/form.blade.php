@include('painel.includes.alerts')
@csrf
<div class="form-group">
    <h4><b>Cadastro de Postagens no Blog</b></h4>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Título da Postagem:</label>
                <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Título da Postagem:"
                    value="{{ $blog->titulo ?? old('titulo') }}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Palavra Chave:</label>
                <input type="text" name="palavras" id="palavras" class="form-control" placeholder="Palavra Chave:"
                    value="{{ $blog->palavras ?? old('palavras') }}">
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Primeira Descrição:</label>
                <textarea maxlength="2000" type="text" class="form-control" placeholder="Primeira Descrição" id="descricao_1" name="descricao_1">{{ $blog->descricao_1 ?? old('descricao_1') }}</textarea>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Segunda Descrição:</label>
                <textarea maxlength="2000" type="text" class="form-control" placeholder="Segunda Descrição" id="descricao_2" name="descricao_2">{{ $blog->descricao_2 ?? old('descricao_2') }}</textarea>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Terceira Descrição:</label>
                <textarea maxlength="2000" type="text" class="form-control" placeholder="Terceira Descrição" id="descricao_3" name="descricao_3">{{ $blog->descricao_3 ?? old('descricao_3') }}</textarea>
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
                            onchange="pegaArquivo(this.files)" value="{{ $blog->imagem ?? old('imagem') }}">
                    </span>
                </span>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                @if (@$blog->imagem)
                    <img src="{{ asset('storage/blogs/' . @$blog->imagem) }}" width="200px"
                        alt="{{ @$blog->titulo }}" id="imgup">
                @else
                    <img src="{{ asset('storage/blogs/semblog.png') }}" width="200px" id="imgup">
                @endif
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Cadastrar Postagem</button>
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
@stop
