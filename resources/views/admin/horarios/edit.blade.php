@extends("layouts.app")

@section("titulo", "Editar")

@section("content")

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    

                    <h2 class="text-center">
                        Horários de <span class="text-success text-bold"> <span class="text-danger">{{$dia}}</span> </span>
                    </h2>
                    
                    <div class="ibox-content">
                        
                        <form action="{{route('horario.update', $horario->id)}}" class="form-validar form-horizontal" method="post" enctype="multipart/form-data" id="id_form">
                            @CSRF
                            @method('PUT')
                             @include('admin.horarios._form_horario')                              
                        </form>
                    </div>
                    <div class="ibox-footer text-right">
                        <a class="btn btn-danger btn-voltar" href="{{route('horario.tras.index')}}">Voltar</a>

                        {{-- <button class="ladda-button ladda-button-demo btn btn-primary"  data-style="expand-right" onclick="confirm_submit()">  --}}
                            {{-- Salvar &nbsp; <i class="fa fa-save"></i> --}}
                        <button onclick="confirm_submit()" class="btn btn-primary">Atualizar &nbsp;<i class="fa fa-save"></i> &nbsp;<span id="id_spinner_start"class="loading open-circle"></span> </button> 
                                                                    

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection