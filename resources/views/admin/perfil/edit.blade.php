@extends("layouts.app")

@section("titulo", "Editar Perfil")

@section("content")

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    

                        <h2 class="text-center">
                            Editar Perfil
                        </h2>
                   
                    <div class="ibox-content">
                        
                        <form action="{{route('perfil.update', $data->id)}}" class="form-validar form-horizontal" method="post" enctype="multipart/form-data" id="id_form">
                            @CSRF
                            @method('PUT')
                             @include('admin.perfil._form')                              
                        
                    </div>
                    <div class="ibox-footer text-right">
                        <a class="btn btn-danger btn-voltar" href="{{route('home')}}">Voltar</a>

                        {{-- <button class="ladda-button ladda-button-demo btn btn-primary"  data-style="expand-right" onclick="confirm_submit()">  --}}
                            
                            <button class="btn btn-primary btn-submit">
                            
                            Salvar &nbsp; <i class="fa fa-save"></i>
                        
                        </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection