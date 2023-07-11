var format = function(num){

    var str = num.toString().replace("", ""), parts = false, output = [], i = 1, formatted = null;
    if(str.indexOf(".") > 0) {
        parts = str.split(".");
        str = parts[0];
    }
    str = str.split("").reverse();
    for(var j = 0, len = str.length; j < len; j++) {
        if(str[j] != ",") {
        output.push(str[j]);
        if(i%3 == 0 && j < (len - 1)) {
            output.push(",");
        }
        i++;
        }
    }
    formatted = output.reverse().join("");
    return("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
};

function submitForm(formId, url, method, data, isUpload){

    var table = $('.my-datatable').DataTable();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    if(isUpload !== ""){
        //upload enctype

        var form = $('#'+formId)[0];
        var data = new FormData(form);

        $.ajax({
            type: method,
            // enctype: 'multipart/form-data',
            url: url,
            data: data,
            // cache: false,
            // timeout: 600000,
            success: function (response) {

                $('div.show-my-toast').append('<div class="toast bg-success" role="alert" aria-live="assertive" aria-atomic="true">'+
                    '<div class="toast-header">'+
                        '<img src="" class="rounded mr-2" alt="">'+
                        '<strong class="mr-auto">Success</strong>'+
                        '<small class="text-muted"></small>'+
                        '<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">'+
                        '<span aria-hidden="true">&times;</span>'+
                        '</button>'+
                    '</div>'+
                    '<div class="toast-body bg-success">'+
                        ''+response.message+''+
                    '</div>'+
                '</div>');

                table.draw();
                $('#'+formId)[0].reset();
                $('.'+formId).modal('hide');
                $(".toast").toast({ delay: 3000 });
                $(".toast").toast('show');

            },
            error: function (e) {
                // console.log(e);

                $('div.show-my-toast').append('<div class="toast bg-danger" role="alert" aria-live="assertive" aria-atomic="true">'+
                    '<div class="toast-header">'+
                        '<img src="" class="rounded mr-2" alt="">'+
                        '<strong class="mr-auto">Error</strong>'+
                        '<small class="text-muted"></small>'+
                        '<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">'+
                        '<span aria-hidden="true">&times;</span>'+
                        '</button>'+
                    '</div>'+
                    '<div class="toast-body bg-danger">'+
                        ''+e.responseJSON.message+''+
                    '</div>'+
                '</div>');

                table.draw();
                $('#'+formId)[0].reset();
                $('.'+formId).modal('hide');
                $(".toast").toast({ delay: 3000 });
                $(".toast").toast('show');

            },
            processData: false,
            contentType: false,
            cache: false,
        });

    }else{
        //post biasa
    }

}

function getProfile(id, url_profile, url_update){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "POST",
        url: url_profile,
        data: {id: id},
        // dataType:"json",
        success: function(response){
            console.log(response);
            $.each(response.data, function(k, v) {
                if(k !== 'photo'){
                    $('input[name="'+k+'"]').val(v).trigger('keyup');
                    $('select[name="'+k+'"]').val(v).trigger('change');
                    $('textarea[name="'+k+'"]').text(v);
                }
            });

            $('.formCRUD').attr('action', url_update);
            $('#myModal').modal('show');
            $('#myModal').modal({backdrop: 'static', keyboard: false});
        },
        error: function(e){
            console.log(e);
        }
    });
}

function showDeleteModal(id, url_delete){

    $('#formDelete').attr('action', url_delete);
    $('#formDelete input[name="id"]').val(id);
    $('#modalConfirm').modal('show');
    $('#modalConfirm').modal({backdrop: 'static', keyboard: false});
}


$(document).ready(function(){

    $('#myModal').on('hidden.bs.modal', function () {
        $('.formCRUD')[0].reset();
        $('textarea').text("");
    })

    $('#btn-add').click(function(){
        $('#myModal').modal({backdrop: 'static', keyboard: false});
    });

    $("form").submit(function (event) {

        event.preventDefault();

        var formId = $(this).attr('id');
        var url = $(this).attr('action');
        var method = $(this).attr('method');
        var enctype = $(this).attr('enctype');
        var data = $('#'+formId).serializeArray();

        var isUpload = (enctype === 'undefined') ? "" : enctype;

        submitForm(formId, url, method, data, isUpload);
        
    });

    $(".formatRupiah").keyup(function(e){

        if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'');
        
        $(this).val(format($(this).val()));
    
    });

})