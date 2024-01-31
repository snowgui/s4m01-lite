@section("styles")

    <link rel="stylesheet" href="{!! asset('css/plugins/jasny/jasny-bootstrap.min.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/plugins/chosen/bootstrap-chosen.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/plugins/clockpicker/clockpicker.css') !!}" />
    
    <link rel="stylesheet" href="{!! asset('css/plugins/ladda/ladda-themeless.min.css') !!}" />
    
    <!-- Text spinners style -->
    <link rel="stylesheet" href="{!! asset('css/plugins/textSpinners/spinners.css') !!}" />
    
@endsection
<div class="col-lg-10 offset-lg-1">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-6">
                
                <div class="form-group">
                    <label class="font-bold text-navy">Entrada</label>
                    <div class="input-group clockpicker" data-autoclose="true">
                        <input name="entrada" id="id_entrada" type="text" class="form-control" value="{{@$horario->entrada}}" autocomplete="off">
                        <span class="input-group-addon">
                            <span class="fa fa-clock-o"></span>
                        </span>
                    </div>
                </div>
                    
            </div>
            <div class="col-lg-6">
                
                <div class="form-group">
                    <label class="font-bold text-danger">Saída</label>
                    <div class="input-group clockpicker" data-autoclose="true">
                        <input name="saida" id="id_saida" type="text" class="form-control" value="{{@$horario->saida}}" autocomplete="off">
                        <span class="input-group-addon">
                            <span class="fa fa-clock-o"></span>
                        </span>
                    </div>
                </div>
                    
            </div>
                    
        </div>
        

        <div class="row">
            <div class="col-lg-6">
                
                <div class="form-group">
                    <label class="font-bold text-navy">Entrada Almoço</label>
                    <div class="input-group clockpicker" data-autoclose="true">
                        <input name="aEntrada" id="id_aEntrada" type="text" class="form-control" value="{{@$horario->aEntrada}}" autocomplete="off">
                        <span class="input-group-addon">
                            <span class="fa fa-clock-o"></span>
                        </span>
                    </div>
                </div>
                    
            </div>
            <div class="col-lg-6">
                
                <div class="form-group">
                    <label class="font-bold text-danger">Saída Almoço</label>
                    <div class="input-group clockpicker" data-autoclose="true">
                        <input name="aSaida" id="id_aSaida" type="text" class="form-control" value="{{@$horario->aSaida}}" autocomplete="off">
                        <span class="input-group-addon">
                            <span class="fa fa-clock-o"></span>
                        </span>
                    </div>
                </div>
                    
            </div>
                    
        </div>
        
        <div class="row">
            <div class="col-lg-6">
                
                <div class="form-group">
                    <label class="font-bold text-navy">Entrada Hora Extra</label>
                    <div class="input-group clockpicker" data-autoclose="true">
                    <input name="heEntrada" id="id_heEntrada" type="text" class="form-control" value="{{@$horario->horaExtaEntrada}}" autocomplete="off" >
                        <span class="input-group-addon">
                            <span class="fa fa-clock-o"></span>
                        </span>
                    </div>
                </div>
                    
            </div>
            <div class="col-lg-6">
                
                <div class="form-group">
                    <label class="font-bold text-danger">Saída Hora Extra</label>
                    <div class="input-group clockpicker" data-autoclose="true">
                        <input name="heSaida" id="id_heSaida" type="text" class="form-control" value="{{@$horario->horaExtraSaida}}" autocomplete="off">
                        <span class="input-group-addon">
                            <span class="fa fa-clock-o"></span>
                        </span>
                    </div>
                </div>
                    
            </div>
                    
        </div>    

    </div>
</div>
@section('scripts')

    <script src="{{ asset('js/plugins/clockpicker/clockpicker.js') }}"></script>
    <script src="{!! asset('js/plugins/jasny/jasny-bootstrap.min.js') !!}"></script>
    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    <script src="{{ asset('js/plugins/chosen/chosen.jquery.js') }}"></script>
   

    {!! JsValidator::formRequest('App\Http\Requests\Horario\HorarioRequest', '.form-validar') !!}

    <script src="{!! asset('js/plugins/ladda/spin.min.js') !!}"></script>
    <script src="{!! asset('js/plugins/ladda/ladda.min.js') !!}"></script>
    <script src="{!! asset('js/plugins/ladda/ladda.jquery.min.js') !!}"></script>

<script>

    $(document).ready(function(){
        $('.chosen-select').chosen({width: "100%"});
        $('.clockpicker').clockpicker();

        $("#id_spinner_start").hide();
        var l = $( '.ladda-button-demo' ).ladda();
        
        l.click(function(){
            // Start loading
            l.ladda( 'start' );

            // Timeout example
            // Do something in backend and then stop ladda
            setTimeout(function(){
                l.ladda('stop');
            },12000)


        });

    });
    
    const confirm_submit = function(e) { 
        
        return new Promise(function (resolve, reject) {

            $("#id_spinner_start").show();
            document.getElementById("id_form").submit();
        });

    }
</script>

@endsection
