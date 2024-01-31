@section("styles")

<link href="{!! asset('componentes/cropper/cropper.css') !!}"  rel="stylesheet">
<link href="{!! asset('css/plugins/cropper/cropper.min.css') !!}" rel="stylesheet">
<link href="{!! asset('css/animate.css') !!}" rel="stylesheet">
@endsection

<input type="hidden" id="id" class="form-control">

<div class="col-lg-10 offset-lg-1">
    <div class="row">

        @if(isset($data))
            <div class="col-lg-12 text-center">

                <div class="">

                    <a onclick="verFoto('{{@$data->foto}}', 'Foto de Perfil');"><img src="{{Foto::getFotoUser(@$data->id)}}" id="id_foto_atual" name="foto_atual" class="rounded-circle circle-border m-b-md" style="width: 150px; height:150px;"></a>
                    <input name="remover_foto" id="id_remover_foto_atual" type="hidden" value="{{false}}"/>

                    <p>
                        @if(isset($data->foto) && $data->foto != '')
                            <small class="text-muted"><a onclick="removerFoto()" >Remover Foto <i class="fa fa-trash text-danger"></i></a></small>
                        @else
                            <small class="text-danger">Sem foto</small>
                        @endif
                    </p>
                </div>


            </div>
        @endif

        <div class="col-lg-4">
            <div class="form-group">
                <label class="font-bold">Nome</label>
                <input type="text" placeholder="* Nome" name="name" value="{{@$data->name}}" class="form-control">
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-group">
                <label class="font-bold">Sobrenome</label>
                <input type="text" placeholder=" Sobrenome" name="sobrenome" value="{{@$data->sobrenome}}" class="form-control">
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-group">
                <label class="font-bold">E-mail</label>
                <input type="text" placeholder="* E-mail" name="email" value="{{@$data->email}}" class="form-control" {{isset($data) ? 'readonly' : ''}}>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label class="font-bold">Senha</label>
                <input type="password" placeholder="* Senha (mínimo 6 digitos)" name="password" value="{{@$data->password}}" class="form-control">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label class="font-bold">Confirme sua senha</label>
                <input type="password" placeholder="* Digite a senha novamente" name="password_confirm" value="{{@$data->password}}" class="form-control">
            </div>
        </div>

    </div>
</div>


<div class="row">
    <div class="col-lg-10 offset-lg-1">

        <div class="ibox ">
            <a class="collapse-link">
            <div class="ibox-title  back-change">

            <label class="font-bold">{{isset($data) ? 'Alterar Foto' : 'Adicionar Foto'}} <i class="fa fa-camera text-navy"></i> </label>
                <div class="ibox-tools">

                    <i class="fa fa-chevron-up text-navy"></i>

                </div>
            </div>
        </a>

            <div class="ibox-content">
                <p>
                   Selecione uma foto para continuar...
                </p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="image-crop">
                            <img src="{{asset('img/sem-foto.jpg')}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4>Prévia</h4>

                        <div class="img-preview img-preview-sm" style="width: 250px; height: 250px;"></div>
                        <h4>Instruções</h4>
                        <p>

                            Você pode carregar uma nova imagem no componente de recorte e fazer o upload da imagem carregada clicando em atualizar.
                        </p>
                        <div>
                            <label title="Upload image file" for="inputImage" class="btn btn-success">
                                <input type="file" accept="image/*" name="foto" id="inputImage" style="display:none">
                                Selecionar Foto
                            </label>
                        </div>

                        {{-- <a href="" id="download" class="btn btn-primary">Download</a> --}}

                        <div class="btn-group">
                            <button class="btn btn-white" id="zoomIn" type="button">Zoom In</button>
                            <button class="btn btn-white" id="zoomOut" type="button">Zoom Out</button>
                            <button class="btn btn-white" id="rotateLeft" type="button">Girar Direita</button>
                            <button class="btn btn-white" id="rotateRight" type="button">Girar Esquerda</button>
                            {{-- <button class="btn btn-warning" id="setDrag" type="button">New crop</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<input type="hidden" name="img" id="id_img">
<input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />


<div class="modal inmodal" id="modal_foto" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

                <h4 class="modal-title" id="modal_msg"></h4>

            </div>
            <div class="modal-body">

                <div class="text-center">
                    <img class="img-thumbnail align-self-center mr-1" id="user_ft">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>

            </div>
        </div>
    </div>
</div>

@section('scripts')

    <script src="{!! asset('js/plugins/cropper/cropper.min.js') !!}"></script>    

    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\User\UserRequest', '.form-validar') !!}

    <script>
        $(document).ready(function(){

            var $image = $(".image-crop > img")
            var $cropped = $($image).cropper({
                aspectRatio: 1.000,
                preview: ".img-preview",
                done: function(data) {
                    // Output the result data for cropping image.
                console.log(data);
                document.getElementById("id_img").value = JSON.stringify(data);

                }
            });

            var $inputImage = $("#inputImage");
            if (window.FileReader) {
                $inputImage.change(function() {
                    var fileReader = new FileReader(),
                            files = this.files,
                            file;

                    if (!files.length) {
                        return;
                    }

                    file = files[0];

                    if (/^image\/\w+$/.test(file.type)) {
                        fileReader.readAsDataURL(file);
                        fileReader.onload = function () {
                            //$inputImage.val("");
                            $image.cropper("reset", true).cropper("replace", this.result);



                        };
                    } else {
                        showMessage("Please choose an image file.");
                    }
                });
            } else {
                $inputImage.addClass("hide");
            }

            $("#download").click(function (link) {
                link.target.href = $cropped.cropper('getCroppedCanvas', { width: 620, height: 520 }).toDataURL("image/png").replace("image/png", "application/octet-stream");
                link.target.download = 'cropped.png';
            });


            $("#zoomIn").click(function() {
                $image.cropper("zoom", 0.1);
            });

            $("#zoomOut").click(function() {
                $image.cropper("zoom", -0.1);
            });

            $("#rotateLeft").click(function() {
                $image.cropper("rotate", 45);
            });

            $("#rotateRight").click(function() {
                $image.cropper("rotate", -45);
        });


        });

    </script>

    <script>

        const verFoto = (ft, msg) => {

            $('#modal_foto').modal('show');
            $('#modal_msg').html(msg);
            $('#user_ft').attr('src', ft);

        }

        const removerFoto = () =>{

            $('#id_remover_foto_atual').val(true);
            $('#id_foto_atual').attr("src", "{{asset('img/avatar2.png')}}");

        }

        @if(session()->has('updated')) SwalAlert(null, "Sucesso", "Atualizado com sucesso!");  @endif

        const confirm_submit = function(e) { 

            return new Promise(function (resolve, reject) {

                $("#id_spinner_start").show();
                document.getElementById("id_form").submit();
                
            });

        }
    </script>
@endsection
