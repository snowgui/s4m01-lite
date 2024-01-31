@extends("layouts.app")

@section("titulo", "Gestão de Linguagens")

@section("styles")

    <link href="{!! asset("css/plugins/dataTables/datatables.min.css") !!}" rel="stylesheet">       

@endsection

@section("content")
    
<div class="row  border-bottom white-bg dashboard-header">
        <div class="col-lg-12">
            <div class="ibox">
                
                <h2 class="text-center">                            
                    Linguagens CDH
                </h2>
                     
                <div class="ibox-content">

                    <div class="">
                        <a href="{{route('CDHLang.create')}}">
                        <button type="button" class="btn btn-w-m btn-primary  float-left">
                            <i class="fa fa-plus-circle"></i> &nbsp;&nbsp;Adicionar</button>
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Ativo</th>
                                <th>Editar</th>
                                <th>Remover</th>                    
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($data as $d)

                                <tr>
                                    
                                    <td title="{{$d->nome}}">
                                        {{$d->nome}} 
                                    </td>
                                    
                                    <td>
                                        @if($d->atv)
                                            <i class='fa fa-check text-navy'> </i>
                                        @else 
                                            <i class='fa fa-close text-danger'> </i>
                                        @endif
                                    </td>
                                    
                                    <td title="Editar">

                                        <a href="{{route('CDHLang.edit', $d->id)}}">                                             
                                            <i class="fa fa-edit _i text-navy" ></i>
                                        </a>
                                        
                                    </td>

                                    @if(Auth::User()->role_id == 1)
                                        <td title="Remover">
                                            <form action="{{ route('CDHLang.destroy', $d->id) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <a><i class="fa fa-trash _i text-danger" onclick="deletar(this)"></i></a>
                                            </form>
                                        </td>
                                    @endif
                                        
                                </tr>
                            @endforeach
                        
                            </tbody>
                        </table>
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
        @if(session()->has('created')) SwalAlert(null, "Sucesso", "Adicionado com sucesso!"); @endif                
        @if(session()->has('destroyed')) SwalAlert(null, "Sucesso", "Removido com sucesso!");  @endif
        @if(session()->has('del-error')) SwalAlert("error", "Erro: {{@$error}}", "Erro para remover!"); @endif
 
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
                    "targets": [0, 1, 2,3],
                    "className": "text-center"
                }, 
                {
                    targets:  [0],
                    render: function ( data, type, row ) {
                        return data.length > 25 ?
                        data.substr( 0, 25 ) +'…' :
                        data;
                    }
                } ],                         
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
        });  

    </script>

@endsection