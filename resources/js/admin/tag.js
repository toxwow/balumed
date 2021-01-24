$("a[data-type='delete']").click(function() {
    var slug = $(this).attr('data-slug');
    var id = $(this).attr('data-id');
    bootbox.confirm({
        size: "small",
        centerVertical: true,
        message: "Czy chcesz usunąć tag?",
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
                axios.delete('/tagi/'+slug, {
                    headers: {

                    },
                    data: {
                        id: id,
                        api: 'deleteTag'
                    }
                })
                    .then(response => {
                        bootbox.alert({
                            message: "Tag usunięty",
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



