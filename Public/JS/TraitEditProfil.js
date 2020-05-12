$(document).ready(function () {
    $("#err").css('display', 'none');
    $("#zonePass").css('display','none');
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

    $("#AncP").keyup(function (e) { 
        var value=$("#AncP").val();
        console.log('boum');
        if(value!=''){
            $("#zonePass").css('display','block');
            $("#spa").css('display','none');
        }else{
            $("#zonePass").css('display','none');
            $("#spa").css('display','block');
        }
    });
    $('#form').on('submit', function(e) {
        event.preventDefault();
        var nom = $("#nom").val();
        var prenom = $("#prenom").val();
        var typeUser = $("#typeUser").val();
        var adressePers = $("#adressePers").val();
        var adresseClinic = $("#adresseClinic").val();
        var tel = $("#tel").val();
        var speciality = $("#speciality").val();
        var AncP=$("#AncP").val();
        var password = $("#password").val();
        var Cpassword = $("#Cpassword").val();
        var pitch = $("#pitch").val();
        var id = $("#id").val();

        $.ajax({
            type: 'POST',
            url: '../App/Controller/Edit_profil.ctrl.php',
            data: {
                nom: nom,
                prenom: prenom,
                typeUser: typeUser,
                adressePers: adressePers,
                adresseClinic: adresseClinic,
                tel: tel,
                speciality: speciality,
                AncP:AncP,
                password: password,
                Cpassword: Cpassword,
                pitch: pitch,
                id:id
            },
            success: function (message) {
                var result = JSON.parse(message);
                if(result!=='Succes'){
                    $("#err").html(result);
                    $("#err").css('display','block');
                }else{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Modification Reussi',
                        showConfirmButton: false,
                        timer: 1500
                      })
                      setTimeout(function(){
                          
                        document.location.href = 'https://online-doctorapp.000webhostapp.com/Pages/Profil/'+id;
                      },1550);
                    $("#err").css('display','none');
                }
            }
        });

    });
});