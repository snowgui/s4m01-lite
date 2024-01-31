@extends('layouts.app')

@section('title', 'Editar')

@section('content')

<div class="wrapper wrapper-content animated fadeInRight ">
<form action="{{ Route('CDHTool.update', $data->id) }}" class="form-validar form-horizontal" method="post" enctype="multipart/form-data">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="text-center" >Editar</h4>
            </div>
            <div class="panel-body">
                {{csrf_field()}}
                {{method_field("PUT")}}
                @include('admin.cdh_tool._form')
            </div>
            <div class="panel-footer text-center">
                <a class="btn btn-danger btn-voltar" href="{{route('CDHTool.index')}}">Voltar</a>
                
                <button onclick="confirm_submit()" class="btn btn-primary">Atualizar &nbsp;<i class="fa fa-save"></i> &nbsp;<span id="id_spinner_start"class="loading open-circle"></span> </button> 
                    
                </button>
            </div>
        </div>
    </form>
</div>
@endsection