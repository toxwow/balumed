$(":input").change(function() {
    $('#changeData').removeAttr('disabled')
});

$( "#changeData" ).click(function() {
    var working_days = $( "input[name*='working_days']" ).val();
    var holiday_days = $( "input[name*='holiday_days']" ).val();
    var phone_one = $( "input[name*='phone_one']" ).val();
    var phone_two = $( "input[name*='phone_two']" ).val();

    axios.put('/info/'+1, {
        working_days: working_days,
        holiday_days: holiday_days,
        phone_one: phone_one,
        phone_two: phone_two
    })
        .then(response => {
            bootbox.alert({
                message: "Dane zaktualizowane",
                centerVertical: true,
            })
        })
        .catch(error => {
            console.log(error);
        });
});
