@include('painel.includes.alerts')
@csrf
<div class="form-group">
    <h4><b>Cadastro de Banner</b></h4>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Título do Banner:</label>
                <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Título do Banner:"
                    value="{{ $banner->titulo ?? old('titulo') }}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Subtitulo do Banner:</label>
                <input type="text" name="subtitulo" id="subtitulo" class="form-control"
                    placeholder="Subtitulo do Banner:" value="{{ $banner->subtitulo ?? old('subtitulo') }}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Link do Banner:</label>
                <input type="text" name="link" id="link" class="form-control"
                    placeholder="Link do Banner:" value="{{ $banner->link ?? old('link') }}">
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Descrição do Banner:</label>
                <input type="text" name="descricao" id="descricao" class="form-control" placeholder="Descrição do Banner:"
                    value="{{ $banner->descricao ?? old('descricao') }}">
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
                            onchange="pegaArquivo(this.files)" value="{{ $banner->imagem ?? old('imagem') }}">
                    </span>
                </span>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                @if (@$banner->imagem)
                    <img src="{{ asset('storage/banners/' . @$banner->imagem) }}" width="200px"
                        alt="{{ @$banner->titulo }}" id="imgup">
                @else
                    <img src="{{ asset('storage/banners/sembanner.png') }}" width="200px" id="imgup">
                @endif
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Cadastrar Banner</button>
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
