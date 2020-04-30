$(document).ready(function () {
    $("#err").css('display', 'none');
    $("#typeUser").change(function () {
        var typeUser = $("#typeUser").val();

        if (typeUser === 'Client') {
            $("#b-adresseClinic").css('display', 'none');
            $("#b-speciality").css('display', 'none');
            $("#err").css('display', 'none');
        } else {
            $("#b-adresseClinic").css('display', 'block');
            $("#b-speciality").css('display', 'block');
            $("#err").css('display', 'none');
        }
    });
    $('#form').on('submit', function(e) {
        event.preventDefault();
        var nom = $("#nom").val();
        var prenom = $("#prenom").val();
        var typeUser = $("#typeUser").val();
        var adressePers = $("#adressePers").val();
        var adresseClinic = $("#adresseClinic").val();
        var email = $("#email").val();
        var tel = $("#tel").val();
        var speciality = $("#speciality").val();
        var password = $("#password").val();
        var Cpassword = $("#Cpassword").val();
        var pitch = $("#pitch").val();

        $.ajax({
            type: 'POST',
            url: '../App/Controller/Register.ctrl.php',
            data: {
                nom: nom,
                prenom: prenom,
                typeUser: typeUser,
                adressePers: adressePers,
                adresseClinic: adresseClinic,
                email: email,
                tel: tel,
                speciality: speciality,
                password: password,
                Cpassword: Cpassword,
                pitch: pitch
            },
            success: function (message) {
                var result = JSON.parse(message);

                if (result !== 'Succes' && result!=='Echec') {
                    $("#err").html(result);
                    $("#err").css('display', 'block');
                }else if(result === 'Echec'){
                    
                    $("#err").html('Desole une erreur s\'est produite veuyillez reesayer de faire l\'inscription');
                    $("#err").css('display', 'block');
                    alertify.error('Desole veuillez verifier votre connexion internet!!!');
                }else if(result === 'Succes'){
                    $("#err").css('display', 'none');
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Un Mail De confirmation vous a ete envoye',
                        showConfirmButton: false,
                        timer: 3500
                      })
                        setTimeout(function(){
                            document.location.href = '../Pages/Home.php';
                        },3000);
                        

                }
            }
        });

    });
});