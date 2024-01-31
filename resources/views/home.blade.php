
@extends("layouts.app")

@section("titulo", "Index")

@section("styles")

@endsection

@section("content")
<!--
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Index</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Index</a>
            </li>
            <li class="breadcrumb-item">
                <a>...</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>...</strong>
            </li>
        </ol>
    </div>
</div>
-->
<div class="row  border-bottom white-bg dashboard-header">
{{-- 
    <div class="col-md-4">
        <h2>Painel Administrativo</h2>
        <small>...</small>
        <ul class="list-group clear-list m-t">
            <li class="list-group-item fist-item">
                <span class="float-right">
                    ...
                </span>
                <span class="label label-success">40</span> Usuários
            </li>
            <li class="list-group-item">
                <span class="float-right">
                    ...
                </span>
                <span class="label label-info">20</span> Pesquisas
            </li>
            <li class="list-group-item">
                <span class="float-right">
                    ...
                </span>
                <span class="label label-primary">3</span> Item
            </li>
            <li class="list-group-item">
                <span class="float-right">
                    ...
                </span>
                <span class="label label-default">4</span> Item
            </li>
            <li class="list-group-item">
                <span class="float-right">
                    ...
                </span>
                <span class="label label-primary">5</span> Item
            </li>
        </ul>
    </div> --}}

    <div class="col-10 offset-1">
        <div class="card text-white bg-dark">
            <div class="card-header">S A M<span class="text-navy"> 0 1</span></div>

            <div class="card-body">
                <h4 class="card-title">Sistema Administrativo Web e Mobile</h4>
                <p class="card-text">Desenvolvido para ser uma solução auxiliar em desenvolvimento de sistemas, contém funcionalidades básicas e helpers que ajudam no desenvolvimento de sistemas baseados em diversas linguagens de programação, além de serviços de <strong>API</strong> e Mobile. </p>
                             
               <div class="row">
                    <div class="col-md-4">
               
                        <div class="card-body">
                          <h5>Admin</h5>
                          <p> <small>Gestão de Horários, Usuários do Sistema, Códigos Base, Lembretes, entre outras funcionalidades. </small></p>
                      
               
                    <ul class="list-group clear-list m-t">
                        <li class="list-group-item fist-item">
                            <span class="float-right">
                                ...
                            </span>
                            <span class="label label-success">{{$users}}</span> Usuários
                        </li>
                        {{-- <li class="list-group-item">
                            <span class="float-right">
                                ...
                            </span>
                            <span class="label label-info">20</span> Pesquisas
                        </li>
                        <li class="list-group-item">
                            <span class="float-right">
                                ...
                            </span>
                            <span class="label label-primary">3</span> Item
                        </li>
                        <li class="list-group-item">
                            <span class="float-right">
                                ...
                            </span>
                            <span class="label label-default">4</span> Item
                        </li>
                        <li class="list-group-item">
                            <span class="float-right">
                                ...
                            </span>
                            <span class="label label-primary">5</span> Item
                        </li> --}}
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
        
                <div class="card-body">
                    <h5>API</h5>
                    <p class=""><small>...</small><br>...</p>
                
        
            <ul class="list-group clear-list m-t">
                <li class="list-group-item fist-item">
                    <span class="float-right">
                        ...
                    </span>
                    <span class="label label-danger">0</span> Endpoints
                </li>
                {{-- <li class="list-group-item">
                    <span class="float-right">
                        ...
                    </span>
                    <span class="label label-info">20</span> Pesquisas
                </li>
                <li class="list-group-item">
                    <span class="float-right">
                        ...
                    </span>
                    <span class="label label-primary">3</span> Item
                </li>
                <li class="list-group-item">
                    <span class="float-right">
                        ...
                    </span>
                    <span class="label label-default">4</span> Item
                </li>
                <li class="list-group-item">
                    <span class="float-right">
                        ...
                    </span>
                    <span class="label label-primary">5</span> Item
                </li> --}}
            </ul>
        </div>
    </div>
            <div class="col-md-4">
        
                <div class="card-body">
                    <h5>Mobile</h5>
                    <p class=""><small>...</small><br>...</p>
                
        
            <ul class="list-group clear-list m-t">
                {{-- <li class="list-group-item fist-item">
                    <span class="float-right">
                        ...
                    </span>
                    <span class="label label-success">40</span> Usuários
                </li>
                <li class="list-group-item">
                    <span class="float-right">
                        ...
                    </span>
                    <span class="label label-info">20</span> Pesquisas
                </li>
                <li class="list-group-item">
                    <span class="float-right">
                        ...
                    </span>
                    <span class="label label-primary">3</span> Item
                </li>
                <li class="list-group-item">
                    <span class="float-right">
                        ...
                    </span>
                    <span class="label label-default">4</span> Item
                </li>
                <li class="list-group-item">
                    <span class="float-right">
                        ...
                    </span>
                    <span class="label label-primary">5</span> Item
                </li> --}}
            </ul>
        </div>
    </div>

                {{-- @if (session("status"))
                    <div class="alert alert-success" role="alert">
                        {{ session("status") }}
                    </div>
                @endif

                You are logged in! --}}
            </div>
        </div>  
    </div>

</div>

{{-- <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Index <small>...</small></h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                  
                   
                    </div>
                </div>
                <div class="ibox-content text-center css-animation-box">
                    <h1 class="text-navy">
                        Index
                    </h1>
                    <p>
                        Tela inicial do sistema
                    </p>
                    <p>
                        Tela inicial do sistema
                    </p>
                    <p>
                        Tela inicial do sistema
                    </p>
                    <p>
                        Tela inicial do sistema
                    </p>
                    <p>
                        Tela inicial do sistema
                    </p>

                    <div class="hr-line-dashed"></div>



                </div>
            </div>
        </div>

    </div>
</div> --}}
@endsection

@section("scripts")

<script type="text/javascript">

    $(document).ready(function() {
        setTimeout(function() {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: "slideDown",
                positionClass: "toast-bottom-right",
                timeOut: 4000
            };
            toastr.info("Bem vindo!", "Hi,");

        }, 1300);

    });

</script>

@endsection