//Axios change select
var token = $("input[name='_token']").attr("value");

$( "select.change" ).change(function() {
    var id = $(this).attr('data-id');
    var status = $(this).find(':selected').attr('data-status');
    var slug = $(this).attr('data-slug');

    $.ajax({
        url: "/blog/" + slug,
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



$("a[data-type='delete']").click(function() {
    var slug = $(this).attr('data-slug');
    var id = $(this).attr('data-id');
    bootbox.confirm({
        size: "small",
        centerVertical: true,
        message: "Czy chcesz usunąć wpis?",
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
                    url: "/blog/" + slug,
                    type: 'POST',
                    data: {
                        "id": id,
                        '_method': 'DELETE',
                        "_token": token,
                        api: 'deleteBlog'
                    },
                    success: function (){
                        bootbox.alert({
                            message: "Blog usunięty",
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



