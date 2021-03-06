var token = $("input[name='_token']").attr("value");

$( "select.change" ).change(function() {
    var id = $(this).attr('data-id');
    var status = $(this).find(':selected').attr('data-status');

    var slug = $(this).attr('data-slug');

    $.ajax({
        url: "/aktualnosci/" + slug,
        type: 'POST',
        data: {
            "id": id,
            '_method': 'PUT',
            'status': status,
            "_token": token,
            api: 'statusChange'
        },
        success: function (){
            bootbox.alert({
                message: "Status zaktualizowany",
                centerVertical: true,
            })
        }
    });
});
function checkIfModal(){
    $( ".select-to-check" ).each(function(  ) {
        let test = $( this ).find(':selected').attr('data-type');
        if(test == 1){
            $( ".select-to-check" ).attr("disabled", true);
            $(this).attr("disabled", false);
        }
    });
}

$( "select.change-type" ).change(function() {
    var id = $(this).attr('data-id');
    var status = $(this).find(':selected').attr('data-type');
    var slug = $(this).attr('data-slug');

    $.ajax({
        url: "/aktualnosci/" + slug,
        type: 'POST',
        data: {
            "id": id,
            '_method': 'PUT',
            'status': status,
            "_token": token,
            api: 'typeChange'
        },
        success: function (){

            location.reload();
        }
    });

});
checkIfModal();




$("a[data-type='delete']").click(function() {
    var slug = $(this).attr('data-slug');
    var id = $(this).attr('data-id');

    bootbox.confirm({
        size: "small",
        centerVertical: true,
        message: "Czy chcesz usunąć aktulność?",
        buttons: {
            confirm: {
                label: 'Tak',
            },
            cancel: {
                label: 'Nie',
                className: 'btn-danger'
            }
        },
        callback: function(result){
            if(result){
                $.ajax({
                    url: "/aktualnosci/" + slug,
                    type: 'POST',
                    data: {
                        "id": id,
                        '_method': 'DELETE',
                        "_token": token,
                        api: 'deletePost'
                    },
                    success: function (){
                        bootbox.alert({
                            message: "Aktualnosc usunięta",
                            centerVertical: true,
                            callback: function(){
                                location.reload(); }
                        })
                    }
                });

            }/* result is a boolean; true = OK, false = Cancel*/
        }
    })
});



