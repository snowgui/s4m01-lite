const SwalAlert = function(type, title, text, confirmButtonColor){
    if(type == undefined || type == null) type = 'success';
    if(title == undefined || title == null) title = 'Alert';
    if(text == undefined || text == null) text = '...';
    if(confirmButtonColor == undefined || confirmButtonColor == null) confirmButtonColor = '#1ab394';

    swal({type, title, text, confirmButtonColor});
}

const deletar = function(e) {

    swal({

        title: "Você tem certeza?",
        text: "Você não será capaz de reverter...",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#dc3545",
        confirmButtonText: "Sim, remover!",
        cancelButtonText: "Não, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: false,
        showLoaderOnConfirm: true,
        allowOutsideClick: false,
        cancelButtonColor: '#1ab394',
        preConfirm: function () {
            return new Promise(function (resolve, reject) {
                e.closest('form').submit();
            })
        }

    });            
}