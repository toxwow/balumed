var token = $("input[name='_token']").attr("value");


$(":input").change(function() {
    $('#changeData').removeAttr('disabled')
});

$( "#changeData" ).click(function() {
    var working_days = $( "input[name*='working_days']" ).val();
    var holiday_days = $( "input[name*='holiday_days']" ).val();
    var phone_one = $( "input[name*='phone_one']" ).val();
    var phone_two = $( "input[name*='phone_two']" ).val();

    $.ajax({
        url: "/info/" + 1,
        type: 'POST',
        data: {
            '_method': 'PUT',
            'status': status,
            "_token": token,
            working_days: working_days,
            holiday_days: holiday_days,
            phone_one: phone_one,
            phone_two: phone_two
        },
        success: function (){
            bootbox.alert({
                message: "Dane zaktualizowany",
                centerVertical: true,
            })
        }
    });

});
