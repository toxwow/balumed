$("a[data-type='delete']").click(function() {
    var slug = $(this).attr('data-slug');
    var id = $(this).attr('data-id');
    var token = $("input[name='_token']").attr("value");

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
                $.ajax({
                    url: "/tagi/" + slug,
                    type: 'POST',
                    data: {
                        "id": id,
                        '_method': 'DELETE',
                        "_token": token,
                        api: 'deleteTag'
                    },
                    success: function (){
                        bootbox.alert({
                            message: "Tag usunięty",
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



