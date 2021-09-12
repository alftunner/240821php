$(document).on('click', ".test", function (e) {
    e.preventDefault();
    var value = {
        country: $('.country').val()
    }

    $.ajax({
        url: "countries.php",
        type: "post",
        data: value,
        dataType: 'json',
        success: function (response) {
            $(".select-area").empty();
            var s = $("<select/>");
            for(var val in response) {
                $("<option />", {value: val, text: response[val]}).appendTo(s);
            }
            s.appendTo(".select-area");
        },
        error: function () {
            $(".select-area").text('Такая страна уже есть, либо вы ввели пустую строку');
        }
    });
});
