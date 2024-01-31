@extends("layouts.app")

@section("titulo", "Gestão de  Usuários")

@section("styles")

    <link href="{!! asset("css/plugins/dataTables/datatables.min.css") !!}" rel="stylesheet">       

@endsection

@section("content")

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="text-center">Gestão de Usuários do Sistema</h4>
        </div>
        <div class="panel-body">
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

@endsection

@section("scripts")
    
    <script src="{!! asset("js/plugins/dataTables/datatables.min.js") !!}"></script>
    <script src="{!! asset("js/plugins/dataTables/dataTables.bootstrap4.min.js") !!}"></script>
    
    
    <script>
        @if(session()->has('updated')) swal('Sucesso', 'Atualizado com sucesso!', 'success'); @endif        
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
                    "targets": [0, 1, 2],
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
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'copy', exportOptions: { columns: [0,1,2] }, text: '<u>C</u>opiar',
                        key: {key: 'c', altKey: true },
                    },
                    {extend: 'csv', exportOptions: { columns: [0,1,2] }, text: 'Csv', },
                    {extend: 'excel', text: 'Excel'},

                    {extend: 'print', exportOptions: {
                        columns: [0,1,2]
                    }, text: 'Print',
                        customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                        }
                    },

                    {extend: 'pdf', exportOptions: { columns: [0,1,2] },  text: 'PDF'},
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
        });

    </script>

@endsection