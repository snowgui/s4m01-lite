@extends("layouts.app")

@section("titulo", "Gestão de  Usuários")

@section("styles")

    <link href="{!! asset("css/plugins/dataTables/datatables.min.css") !!}" rel="stylesheet">       

@endsection

@section("content")
    
<div class="row  border-bottom white-bg dashboard-header">
        <div class="col-lg-12">
            <div class="ibox">
                
                <h2 class="text-center">                            
                    Gestão de Usuários do Sistema
                </h2>
                     
                <div class="ibox-content">

                    <div class="">
                        <a href="{{route('user.create')}}">
                        <button type="button" class="btn btn-w-m btn-primary  float-left">
                            <i class="fa fa-plus-circle"></i> &nbsp;&nbsp;Adicionar</button>
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Sobrenome</th>
                                <th>E-mail</th>                         
                                <th>Editar</th>
                                @if(Auth::User()->role_id == 1)
                                    <th>Remover </th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($usuarios as $u)

                                <tr>
                                    
                                    <td title="{{$u->name}}">
                                        {{$u->name}} 
                                    </td>

                                    <td title="{{$u->sobrenome}}">
                                        {{$u->sobrenome}} 
                                    </td>

                                    <td title="{{$u->email}}">
                                        {{$u->email}} 
                                    </td>
                                    
                                    <td title="Editar">

                                        <a href="{{route('user.edit', $u->id)}}">                                             
                                            <i class="fa fa-edit _i text-navy" ></i>
                                        </a>
                                        
                                    </td>

                                    @if(Auth::User()->role_id == 1)
                                        <td title="Remover">
                                            <a href="{{route('user.destroy', $u->id)}}">                                            
                                                <i class="fa fa-trash _i text-danger" ></i>
                                            </a>
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
    
    <script src="{!! asset("js/plugins/dataTables/datatables.min.js") !!}"></script>
    <script src="{!! asset("js/plugins/dataTables/dataTables.bootstrap4.min.js") !!}"></script>
    
    <script>
        @if(session()->has('created')) SwalAlert(null, "Sucesso", "Adicionado com sucesso!"); @endif         
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
                    "targets": [0, 1, 2, 3, 4],
                    "className": "text-center"
                }, 
                {
                    targets:  [0,1,2],
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