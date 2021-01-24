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
                axios.delete('/aktualnosci/'+slug, {
                    headers: {

                    },
                    data: {
                        id: id,
                        api: 'deletePost'
                    }
                })
                    .then(response => {
                        bootbox.alert({
                            message: "Aktualność usunięta",
                            centerVertical: true,
                            callback: function(){
                                location.reload(); }
                        })

                    })
                    .catch(error => {
                        console.log(error);
                    });
            }/* result is a boolean; true = OK, false = Cancel*/ }
    })
});



