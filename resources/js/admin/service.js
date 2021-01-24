//Axios change select

$( "select.change" ).change(function() {
    var id = $(this).attr('data-id');
    var status = $(this).find(':selected').attr('data-status');
    var slug = $(this).attr('data-slug');

    axios.put('/uslugi/'+slug, {
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
        message: "Czy chcesz usunąć usługę?",
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
                axios.delete('/uslugi/'+slug, {
                    headers: {

                    },
                    data: {
                        id: id,
                        api: 'deleteService'
                    }
                })
                    .then(response => {
                        bootbox.alert({
                            message: "Usługa usunięty",
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



