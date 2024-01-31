@extends("layouts.app")

@section('titulo', 'Code Helper')

@section('styles')

    <link href="{!! asset('css/plugins/dataTables/datatables.min.css') !!}" rel="stylesheet">
    <link rel="stylesheet" href="{!! asset('componentes/sweet-alert/sweet-alert.css') !!}" />

@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="ibox">

                    <h2 class="text-center">
                        Code Helper
                    </h2>


                    <div class="ibox-content">
                        <div class="">
                            <a href="{{ route('CodeHelper.create') }}">
                                <button type="button" class="btn btn-w-m btn-primary  float-left">
                                    <i class="fa fa-plus-circle"></i> &nbsp;&nbsp;Adicionar</button>
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered" id="table">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Code</th>
                                        <th>Frame</th>
                                        <th>Lang</th>
                                        <th>Categoria</th>
                                        <th>Tool</th>
                                        <th>SO</th>
                                        <th>Editar</th>
                                        @if (Auth::User()->role_id == 1)
                                            <th>Remover </th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($data as $d)

                                        <tr>

                                            <td title="{{ $d->nome }}">
                                                {{ $d->nome }}
                                            </td>

                                            <td title="{{ $d->code }}">
                                                <i class="fa fa-search text-success" style="cursor:pointer;"
                                                    onclick="viewCode('{{ $d->id }}')"></i>
                                            </td>

                                            <td title="{{ @$d->Frame->nome }}">
                                                {{ @$d->Frame->nome }}
                                            </td>

                                            <td title="{{ @$d->Lang->nome }}">
                                                {{ @$d->lang->nome }}
                                            </td>
                                            <td title="{{ @$d->Cat->nome }}">
                                                {{ @$d->Cat->nome }}
                                            </td>
                                            <td title="{{ @$d->Tool->nome }}">
                                                {{ @$d->Tool->nome }}
                                            </td>
                                            <td title="{{ @$d->SO->nome }}">
                                                {{ @$d->SO->nome }}
                                            </td>
                                            <td title="Editar">

                                                <a href="{{ route('CodeHelper.edit', $d->id) }}">
                                                    <i class="fa fa-edit _i text-navy"></i>
                                                </a>

                                            </td>

                                            @if (Auth::User()->role_id == 1)
                                                <td title="Remover">
                                                    <form action="{{ route('CodeHelper.destroy', $d->id) }}"
                                                        method="post">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <a><i class="fa fa-trash _i text-danger"
                                                                onclick="deletar(this)"></i></a>
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
    </div>

    <div class="modal inmodal fade" id="id_modal_view_code" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="id_modal_view_title">Modal title</h4>
                    <!-- <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small> -->
                </div>

                <div class="modal-body">
                    <div id="id_modal_view_content" style="overflow:auto;">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script src="{!! asset('componentes/sweet-alert/sweet-alert.js') !!}"></script>
    <script src="{!! asset('js/plugins/dataTables/datatables.min.js') !!}"></script>
    <script src="{!! asset('js/plugins/dataTables/dataTables.bootstrap4.min.js') !!}"></script>

    <script>
        @if (session()->has('created')) SwalAlert(null, "Sucesso", "Adicionado com sucesso!"); @endif
        @if (session()->has('updated')) SwalAlert(null, "Sucesso", "Atualizado com sucesso!");  @endif
        @if (session()->has('destroyed')) SwalAlert(null, "Sucesso", "Removido com sucesso!");  @endif
    </script>

    <script type="text/javascript">
        $(document).ready(function() {

            $('#table').DataTable({
                pageLength: 50,
                lengthChange: false,
                responsive: true,
                //order: [[ 2, "desc" ]],
                dom: 'lTfgitp',
                columnDefs: [{
                        "targets": [0, 1, 2, 3, 4, 5, 6,7,8],
                        "className": "text-center"
                    },
                    {
                        targets: [0, 2, 3],
                        render: function(data, type, row) {
                            return data.length > 25 ?
                                data.substr(0, 25) + '…' :
                                data;
                        }
                    }
                ],
                // dom: '<"html5buttons"B>lTfgitp',
                // buttons: [
                //     {extend: 'copy', exportOptions: { columns: [0,1,2,3,4,5] }, text: '<u>C</u>opiar',
                //         key: {key: 'c', altKey: true },
                //     },
                //     {extend: 'csv', exportOptions: { columns: [0,1,2,3,4,5] }, text: 'Csv', },
                //     {extend: 'excel', text: 'Excel'},

                //     {extend: 'print', exportOptions: {
                //         columns: [0,1,2,3,4,5]
                //     }, text: 'Print',
                //         customize: function (win){
                //             $(win.document.body).addClass('white-bg');
                //             $(win.document.body).css('font-size', '10px');

                //             $(win.document.body).find('table')
                //                     .addClass('compact')
                //                     .css('font-size', 'inherit');
                //         }
                //     },

                //     {extend: 'pdf', exportOptions: { columns: [0,1,2,3,4,5] },  text: 'PDF'},
                //     //{extend: 'pdf', title: 'ExampleFile'},
                // ],
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

        const viewCode = (id_code) => {

            let v_url = "{{ route('code.helper.getcode') }}";
            let dt = {
                id: id_code
            };

            $.ajax({
                url: v_url,
                contentType: 'application/json; charset=utf-8',
                type: 'GET',
                data: dt,
                success: function(res) {
                    $("#id_modal_view_title").html(res.nome);
                    $("#id_modal_view_content").html(res.code);
                    $("#id_modal_view_code").modal("show");

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert("Erro para carregar!");
                }
            });
        }
    </script>

@endsection
