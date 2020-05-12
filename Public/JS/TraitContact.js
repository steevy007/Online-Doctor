$(document).ready(function() {
  //$('#form').parsley();
  $("#err").css('display','none');
    $('#form').on('submit', function(e) {
        e.preventDefault();
        var fullname=$("#fullname").val();
        var email=$("#email").val();
        var subject=$("#subject").val();
        var message=$("#message").val();
        $.ajax({
          type:'POST',
          url:'../App/Controller/Contact.ctrl.php',
          data:{
            fullname:fullname,
            email:email,
            subject:subject,
            message:message
          },
          success:function(message){
            var result=JSON.parse(message);
            if(result!=='Succes'){
              $("#err").html(result);
              $("#err").css('display','block');
            }else{
              $("#err").css('display','none');
              Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Merci!! Nous vous contacterons dans moin de 24 heure',
                showConfirmButton: false,
                timer: 1500
              })
              setTimeout(function(){
                document.location.href='https://online-doctorapp.000webhostapp.com/Pages/Accueil';
              }, 3000)
              
            }
          }
        });
    });
});