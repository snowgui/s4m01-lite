@section("styles")
    <link rel="stylesheet" href="{!! asset('css/plugins/switchery/switchery.css') !!}" />    
@endsection

<div class="row">
    <div class="col-8 offset-2">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input name="nome" id="nome" type="text" class="form-control" value="{{@$data->nome}}">
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <label class="font-bold">Ativar?</label>
                <p><input type="checkbox" name="atv" class="js-switch" {{isset($data->atv) && $data->atv == true ? 'checked' : ''}}/></p>
                
            </div>
        </div>


    </div>
</div>

@section('scripts')
    
    <script src="{{ asset('js/plugins/switchery/switchery.js')}}"></script>
    <script src="{!! asset('componentes/jquery-mask/jquery-mask.js') !!}"></script>
    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\CDHCategoria\CDHCategoriaRequest', '.form-validar') !!}
    
    <script>

        $(document).ready(function() {
            var elem = document.querySelector('.js-switch');
            var switchery = new Switchery(elem, { color: '#1ab394' });
        });

        @if(session()->has('updated')) SwalAlert(null, "Sucesso", "Atualizado com sucesso!");  @endif

    </script>
@endsection