$( "select.change" ).change(function() {
    var id = $(this).attr('data-id');
    var status = $(this).find(':selected').attr('data-status');

    var slug = $(this).attr('data-slug');

    axios.put('/aktualnosci/'+slug, {
        status: status,
        id: id,
        api: 'statusChange'
    })
        .then(response => {
            bootbox.alert({
                message: "Status zaktualizowany",
                centerVertical: true,
            })
        })
        .catch(error => {
            console.log(error);
        });
});



$("a[data-type='delete']").click(function() {
    var slug = $(this).attr('data-slug');
    var id = $(this).attr('data-id');
    var token = $("input[name='_token']").attr("value");

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



