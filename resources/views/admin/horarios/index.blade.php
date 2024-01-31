@extends("layouts.app")

@section("titulo", "Horários de  $mes_atual")

@section("styles")

    <link href="{!! asset("css/plugins/dataTables/datatables.min.css") !!}" rel="stylesheet">   

@endsection

@section("content")

    
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                
                    <h2 class="text-center">                            
                        Horários de <span class="text-navy text-bold"> {{ $mes_atual }} </span>
                    </h2>
                    <div class="text-center">
                        <label class="text-normal">{{ $dia_atual }}</label>
                        <p  style="font-size: 0.8em !important;">
                            <label class="text-danger text-bold"> HA. </label>: Hora Almoço
                            {{-- <label class="text-danger text-bold">HE. </label>: Hora Extra --}}
                        </p>
                    </div>
                    {{-- <h5 class="text-center">
                        {{ $dia_atual }}
                    </h5>
                    <h5 class="text-center" style="font-size: 0.8em !important;">
                        <span class="text-danger text-bold"> HA. </span>: Hora Almoço,
                        <span class="text-danger text-bold">HE. </span>: Hora Extra
                    </h5> --}}
                    
                
                <div class="ibox-content">

                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                
                                <label class="font-bold">Alterar Mês</label>
                                <select name="smes" id="id_select_mes" class="form-control" data-dependent="state">                                    
                                    <option value="01" {{$mes_atual == "Janeiro"? "selected" : ""}}>Janeiro</option>
                                    <option value="02" {{$mes_atual == "Fevereiro" ? "selected" : ""}}>Fevereiro</option>
                                    <option value="03" {{$mes_atual == "Março" ? "selected" : ""}}>Março</option>
                                    <option value="04" {{$mes_atual == "Abril" ? "selected" : ""}}>Abril</option>
                                    <option value="05" {{$mes_atual == "Maio" ? "selected" : ""}}>Maio</option>
                                    <option value="06" {{$mes_atual == "Junho" ? "selected" : ""}}>Junho</option>
                                    <option value="07" {{$mes_atual == "Julho" ? "selected" : ""}}>Julho</option>
                                    <option value="08" {{$mes_atual == "Agosto" ? "selected" : ""}}>Agosto</option>
                                    <option value="09" {{$mes_atual == "Setembro" ? "selected" : ""}}>Setembro</option>
                                    <option value="10" {{$mes_atual == "Outubro" ? "selected" : ""}}>Outubro</option>
                                    <option value="11" {{$mes_atual == "Novembro" ? "selected" : ""}}>Novembro</option>
                                    <option value="12" {{$mes_atual == "Dezembro" ? "selected" : ""}}>Dezembro</option>
                                    
                                </select>
                            </div>
                        </div>
                       
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Dia S.</th>
                                <th>Entrada</th>
                                <th><span class="text-danger" style="font-size: 0.6em !important;">HA.</span> Entrada</th>
                                <th><span class="text-danger" style="font-size: 0.6em !important;">HA.</span> Saída</th>
                                <th>Saída</th>
                                {{-- <th><span class="text-danger" style="font-size: 0.6em !important;"> HE.</span> Entrada</th> --}}
                                {{-- <th><span class="text-danger" style="font-size: 0.6em !important;">HE.</span> Saída</th> --}}
                                <th>Editar</th> 
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($horarios as $h)

                                <tr class="{{$h->marcar == true ? 'blinking' : ''}}">
                            
                                    <td title="{{$h->dia}}">{{$h->dia}}</td>                                        
                                    <td title="{{$h->dia_semana}}"><span class="text-danger">{{$h->dia_semana}}</span></td>                                        
                                    <td title="{{$h->entrada}}">{{$h->entrada}}</td>                                        
                                    <td title="{{$h->aEntrada}}">{{$h->aEntrada}}</td>
                                    <td title="{{$h->aSaida}}">{{$h->aSaida}}</td>
                                    <td title="{{$h->saida}}">{{$h->saida}}</td>                            
                                    {{-- <td title="{{$h->heExtraEntrada}}">{{$h->heExtraEntrada}}</td>                             --}}
                                    {{-- <td title="{{$h->heSaida}}">{{$h->heSaida}}</td>  --}}
                                    <td title="Editar">

                                        <a href="{{route("horario.edit", [$h->id, str_replace("/", "-", $h->dia)])}}">                                            
                                            <i class="fa fa-edit _i text-navy" ></i>
                                        </a>
                                        
                                    </td>
                                        
                                </tr>
                            @endforeach
                        
                        </tbody>

                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection

@section("scripts")
    
    <script src="{!! asset('js/plugins/dataTables/datatables.min.js') !!}"></script>
    <script src="{!! asset('js/plugins/dataTables/dataTables.bootstrap4.min.js') !!}"></script>
    
    
    <script>        
        @if(session()->has('updated')) SwalAlert(null, "Sucesso", "Atualizado com sucesso!");  @endif                          
    </script>
    
    <script type="text/javascript">
       $(document).ready(function() {

            $('#table').DataTable({
                pageLength: 50,
                lengthChange: false,
                responsive: true,
                //order: [[ 2, "desc" ]],
                dom: 'lTfgitp',
                columnDefs: [
                {
                    "targets": [0, 1, 2, 3, 4, 5, 6],
                    "className": "text-center"
                }, 
                {
                    targets:  [2,3,4,5],
                    render: function ( data, type, row ) {
                        return data.length > 25 ?
                        data.substr( 0, 25 ) +'…' :
                        data;
                    }
                } ],            
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'copy', exportOptions: { columns: [2,3,4,5] }, text: '<u>C</u>opiar',
                        key: {key: 'c', altKey: true },
                    },
                    {extend: 'csv', exportOptions: { columns: [0,1,2,3,4,5] }, text: 'Csv', },
                    {extend: 'excel', text: 'Excel'},

                    {extend: 'print', exportOptions: {
                        columns: [0,1,2,3,4,5]
                    }, text: 'Print',
                        customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                        }
                    },
                    
                    {extend: 'pdf', title: 'Ponto', exportOptions: { columns: [0,1,2,3,4,5] }},

                    // {extend: 'pdf', exportOptions: { columns: [0,1,2,3,4,5] },  text: 'PDF'},
                    //{extend: 'pdf', title: 'ExampleFile'},
                ],
                oLanguage: {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                        "sNext": "Próximo",
                        "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "Último"
                    },
                    "oAria": {
                        "sSortAscending": ": Ordenar colunas de forma ascendente",
                        "sSortDescending": ": Ordenar colunas de forma descendente"
                    },
                    "select": {
                        "rows": {
                            "_": "Selecionado %d linhas",
                            "0": "Nenhuma linha selecionada",
                            "1": "Selecionado 1 linha"
                        }
                    }
                }

            });

            $('#id_select_mes').change(function (){
                
                // console.log($(this).val());
                window.location.href = "/horario/trasmontano/" + $(this).val();
            });
        });

    </script>

@endsection