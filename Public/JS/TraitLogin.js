$(document).ready(function () {
    $('#form').on('submit', function(e) {
        event.preventDefault();
        var email=$('#email').val();
        var password=$('#password').val();
        $.ajax({
            type: 'POST',
            url: '../App/Controller/Login.ctrl.php',
            data: {
                email:email,
                password:password
            },
            success: function (message) {
                var result = JSON.parse(message);
                if(result!='success'){
                    alertify.warning(result);
                }else{
                    document.location.href = '../Pages/Home.php?connect=true';
                }
            }
        });
    });
});