<div class="row">
    <div class="col-8 offset-2">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input name="nome" id="nome" type="text" class="form-control" value="{{@$model->nome}}">
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="desc">Descrição</label>
                    <input name="desc" id="desc" type="text" class="form-control" value="{{@$model->desc}}">
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <label class="font-bold">Ativar?</label>
                <p><input type="checkbox" name="atv" class="js-switch" {{isset($model->atv) && $model->atv == true ? 'checked' : ''}}/></p>
                
            </div>
        </div>


    </div>
</div>  