@section('styles')

    <link rel="stylesheet" href="{!! asset('css/plugins/ladda/ladda-themeless.min.css') !!}" />

    <!-- Text spinners style -->
    <link rel="stylesheet" href="{!! asset('css/plugins/textSpinners/spinners.css') !!}" />

    <!-- CodeMirror -->
    <link rel="stylesheet" href="{!! asset('css/plugins/codemirror/codemirror.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/plugins/codemirror/ambiance.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/plugins/summernote/summernote-bs4.css') !!}">

    <style>
        .note-editor {
            font-family: Consolas !important;
        }

    </style>

@endsection

<div class="col-lg-10 offset-lg-1">
    <div class="col-lg-12">

        <div class="row">

            <div class="col-lg-6">
                <div class="form-group">
                    <label class="font-bold">Nome</label>
                    <input type="text" placeholder="* Nome" name="nome" value="{{ @$data->nome }}"
                        class="form-control">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">

                    <label class="font-bold">Categoria</label>
                    <select name="c_d_h_categoria_id" class="form-control" data-dependent="state">
                        <option selected disabled>Selecione...</option>
                        @foreach ($cats as $c)
                            <option value="{{ $c->id }}"
                                {{ isset($data->c_d_h_categoria_id) && $c->id == @$data->c_d_h_categoria_id ? 'selected' : '' }}>
                                {{ $c->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">

                    <label class="font-bold">Linguagem <span class=" fa fa-file-code-o"> </span></label>
                    <select name="c_d_h_lang_id" class="form-control" data-dependent="state">
                        <option selected disabled>Selecione...</option>
                        @foreach ($langs as $l)
                            <option value="{{ $l->id }}"
                                {{ isset($data->c_d_h_lang_id) && $l->id == @$data->c_d_h_lang_id ? 'selected' : '' }}>
                                {{ $l->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">

                    <label class="font-bold">Framework</label>
                    <select name="c_d_h_framework_id" class="form-control" data-dependent="state">
                        <option selected disabled>Selecione...</option>
                        @foreach ($frames as $f)
                            <option value="{{ $f->id }}"
                                {{ isset($data->c_d_h_framework_id) && $f->id == @$data->c_d_h_framework_id ? 'selected' : '' }}>
                                {{ $f->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">

                    <label class="font-bold">Tool</label>
                    <select name="c_d_h_tool_id" class="form-control" data-dependent="state">
                        <option selected disabled>Selecione...</option>
                        @foreach ($tools as $t)
                            <option value="{{ $t->id }}"
                                {{ isset($data->c_d_h_tool_id) && $t->id == @$data->c_d_h_tool_id ? 'selected' : '' }}>
                                {{ $t->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="col-lg-6">
                <div class="form-group">

                    <label class="font-bold">SO</label>
                    <select name="c_d_h_so_id" class="form-control" data-dependent="state">
                        <option selected disabled>Selecione...</option>
                        @foreach ($sos as $s)
                            <option value="{{ $s->id }}"
                                {{ isset($data->c_d_h_so_id) && $s->id == @$data->c_d_h_tool_id ? 'selected' : '' }}>
                                {{ $s->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">

                    {{-- <div class="summernote"> --}}
                    <textarea class="summernote" name="code" hidden id="id_code">
                                {{ @$data->code }}
                            </textarea>

                    {{-- </div> --}}

                </div>
            </div>
        </div>
    </div>
</div>
@section('scripts')

    <script src="{{ asset('js/plugins/clockpicker/clockpicker.js') }}"></script>
    <script src="{!! asset('js/plugins/jasny/jasny-bootstrap.min.js') !!}"></script>
    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    <script src="{{ asset('js/plugins/chosen/chosen.jquery.js') }}"></script>


    {!! JsValidator::formRequest('App\Http\Requests\CodeHelper\CodeHelperRequest', '.form-validar') !!}

    <script src="{!! asset('js/plugins/ladda/spin.min.js') !!}"></script>
    <script src="{!! asset('js/plugins/ladda/ladda.min.js') !!}"></script>
    <script src="{!! asset('js/plugins/ladda/ladda.jquery.min.js') !!}"></script>


    <!-- CodeMirror -->
    <script src="{!! asset('js/plugins/codemirror/codemirror.js') !!}"></script>
    <script src="{!! asset('js/plugins/codemirror/mode/javascript/javascript.js') !!}"></script>

    <script src="{!! asset('js/plugins/summernote/summernote-bs4.js') !!}"></script>

    <script>
        $(document).ready(function() {

            // $('.summernote').summernote();

            $('.summernote').summernote({

                // callbacks: {
                //     onInit: function() {
                //         $("div.note-editor button.btn-codeview").click();
                //     }
                // },
                lang: 'pt-BR',
                height: 400,
                disableResizeEditor: true,
                fontNames: ['Arial', 'Consolas'],
                defaultFontName: 'Arial',
                popover: {
                    image: [],
                    link: [],
                    air: []
                },
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['insert', ['link', 'picture', 'hr', 'video']],
                    ['view', ['codeview']]
                ]
            });

            $("#id_spinner_start").hide();
            var l = $('.ladda-button-demo').ladda();

            l.click(function() {
                // Start loading
                l.ladda('start');

                // Timeout example
                // Do something in backend and then stop ladda
                setTimeout(function() {
                    l.ladda('stop');
                }, 12000)


            });


            var editor_one = CodeMirror.fromTextArea(document.getElementById("code1"), {
                lineNumbers: true,
                matchBrackets: true,
                styleActiveLine: true,
                theme: "ambiance"

            });

            // var editor_two = CodeMirror.fromTextArea(document.getElementById("code2"), {
            //     lineNumbers: true,
            //     matchBrackets: true,
            //     styleActiveLine: true
            // });

        });

        const confirm_submit = function(e) {

            return new Promise(function(resolve, reject) {

                $("#id_spinner_start").show();
                document.getElementById("id_form").submit();
            });

        }

        @if (session()->has('updated')) SwalAlert(null, "Sucesso", "Atualizado com sucesso!");  @endif
    </script>

@endsection
