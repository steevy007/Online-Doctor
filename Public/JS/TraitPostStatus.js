$(document).ready(function () {
    $('#formu').on('submit', function (e) {
        e.preventDefault();
        var text = $("#text").val();
        $.ajax({
            type: 'POST',
            url: '../App/Controller/PostStatus.ctrl.php',
            data: {
                text: text
            },
            success: function (message) {
                var result = JSON.parse(message);
                //console.log('bon bagay');
                if (result !== 'Succes') {
                    alertify.error(result);
                } else if (result === 'Succes') {
                    $("#text").val('');
                    alertify.success('Satuts poster avec succes');
                }
            }
        });

    });
    setInterval(function () {
        $("#listing").load("../App/Controller/getStatus.ctrl.php").fadeIn("slow");
    },1000);
});