@section("styles")
    <link rel="stylesheet" href="{!! asset('css/plugins/switchery/switchery.css') !!}" />    
@endsection

@include('admin.cdh_framework._form')

@section('scripts')
    
    <script src="{{ asset('js/plugins/switchery/switchery.js')}}"></script>
    <script src="{!! asset('componentes/jquery-mask/jquery-mask.js') !!}"></script>
    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\CDHFramework\CDHFrameworkRequest', '.form-validar') !!}
    
    <script>

        $(document).ready(function() {
            var elem = document.querySelector('.js-switch');
            var switchery = new Switchery(elem, { color: '#1ab394' });
        });

        @if(session()->has('updated')) SwalAlert(null, "Sucesso", "Atualizado com sucesso!");  @endif

    </script>
@endsection