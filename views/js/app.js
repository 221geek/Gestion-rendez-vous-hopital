function isEmail(mail){
    var regEmail = new RegExp('^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$','i');
    return regEmail.test(mail);
}

$(document).ready(function(){
    $(".gif").fadeOut(4000, function(){
        $("#content").fadeIn(4000);
    });
})


function traitementJS(f){


    /* 
    var email = document.getElementById("email").value, password = document.getElementById("password").value, erreurMail = document.getElementById("emailHelp"), erreurPassword = document.getElementById("passwordHelp"), inputEmail = document.getElementById("email"), inputPassword = document.getElementById("password");

    if(email === ""){
        erreurMail.classList.remove("hide")
        inputEmail.classList.add("borderRed")
        if (erreurMail.innerHTML === "") {
            erreurMail.innerHTML += '<p>Veillez indiquer votre adresse mail svp</p>'
        }
    }
    if(password === ""){
        erreurPassword.classList.remove("hide")
        inputPassword.classList.add("borderRed")
        if (erreurPassword.innerHTML === ""){
            erreurPassword.innerHTML += '<p>Veillez indiquer votre mot de passe svp</p>'
        }
    }
    if (!isEmail(email)){
        erreurMail.classList.remove("hide")
        inputEmail.classList.add("borderRed")
        if (erreurMail.innerHTML === "") {
            erreurMail.innerHTML += '<p>Adresse mail incorrecte</p>'
        }
    }
    if(isEmail(email)){
        if (password === "1234") {
            $('#submit-btn').removeAttr('type');
            $('#submit-btn').attr('type','submit');
        }
    } */
}

$(document).on("click", ".openConfirm", function () {
    var value = $(this).data('email');
    name = $(this).data("name");
    $(".modal-body #confirm").val(value);
    document.getElementById('text').innerHTML += name;
});

$(document).on("click", ".openEdit", function () {
    var nom = $(this).data('nom'), prenom = $(this).data('prenom'), mail = $(this).data('mail'), pass = $(this).data('pass'), service = $(this).data('service');
    $(".modal-body #lastname").val(nom);
    $(".modal-body #firstname").val(prenom);
    $(".modal-body #email").val(mail);
    $(".modal-body #password").val(pass);
    $(".modal-body #service").val(service);
});