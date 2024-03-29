//Axios change select
var token = $("input[name='_token']").attr("value");

$("select.change").change(function() {
    var id = $(this).attr("data-id");
    var status = $(this)
        .find(":selected")
        .attr("data-status");
    var slug = $(this).attr("data-slug");

    $.ajax({
        url: "/uslugi/" + slug,
        type: "POST",
        data: {
            id: id,
            _method: "PUT",
            status: status,
            _token: token,
            api: "statusChange"
        },
        success: function() {
            bootbox.alert({
                message: "Status zaktualizowany",
                centerVertical: true
            });
        }
    });
});

$(".priorityChange").change(function() {
    var id = $(this).attr("data-id");
    var status = $(this).val();
    var slug = $(this).attr("data-slug");

    $.ajax({
        url: "/uslugi/" + slug,
        type: "POST",
        data: {
            id: id,
            _method: "PUT",
            status: status,
            _token: token,
            api: "priorityChange"
        },
        success: function() {
            Location.reload();
        }
    });
});

$("a[data-type='delete']").click(function() {
    var slug = $(this).attr("data-slug");
    var id = $(this).attr("data-id");
    bootbox.confirm({
        size: "small",
        centerVertical: true,
        message: "Czy chcesz usunąć usługę?",
        buttons: {
            confirm: {
                label: "Tak"
            },
            cancel: {
                label: "Nie",
                className: "btn-danger"
            }
        },
        callback: function(result) {
            if (result) {
                $.ajax({
                    url: "/uslugi/" + slug,
                    type: "POST",
                    data: {
                        id: id,
                        _method: "DELETE",
                        _token: token,
                        api: "deleteService"
                    },
                    success: function() {
                        bootbox.alert({
                            message: "Usługa usuniętya",
                            centerVertical: true,
                            callback: function() {
                                location.reload();
                            }
                        });
                    }
                });
            } /* result is a boolean; true = OK, false = Cancel*/
        }
    });
});
