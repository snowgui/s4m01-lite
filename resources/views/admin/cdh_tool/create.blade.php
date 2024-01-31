@extends('layouts.app')

@section('title', 'Adicionar')

@section('content')

<div class="wrapper wrapper-content animated fadeInRight ">
<form action="{{ Route('CDHTool.store') }}" class="form-validar form-horizontal" method="post" enctype="multipart/form-data">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="text-center" >Adicionar</h4>
            </div>
            <div class="panel-body">
                {{csrf_field()}}                
                @include('admin.cdh_tool._form')
            </div>
            <div class="panel-footer text-center">
                <a class="btn btn-danger btn-voltar" href="{{route('CDHTool.index')}}">Voltar</a>
                <button class="btn btn-primary btn-submit" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Carregando">Adicionar &nbsp;<i class="fa fa-save"></i> 
                <!-- <button onclick="confirm_submit()" class="btn btn-primary">Adicionar &nbsp;<i class="fa fa-save"></i> &nbsp;<span id="id_spinner_start"class="loading open-circle"></span> </button>  -->
                    
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
