$(document).ready(function () {
    setInterval(function () {
        $("#load-User").load("../App/Controller/IncludeListUser.ctrl.php").fadeIn("slow");
    },1000);
});