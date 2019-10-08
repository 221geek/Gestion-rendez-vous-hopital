$(document).ready(function(){
    $(".gif").fadeOut(5000, function(){
        $("#content").fadeIn(5000);
    });
})

function traitementJS(){
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
    if (!isEmail(email)) {
        erreurMail.classList.remove("hide")
        inputEmail.classList.add("borderRed")
        if (erreurMail.innerHTML === "") {
            erreurMail.innerHTML += '<p>Adresse mail incorrecte</p>'
        }
    }
    if(isEmail(email)){
        if (password != "" && password.length > 8) {
            /* envoyer les variables dans config/traitement.php pour verification dans la base de donnée */
        }
    }
    
}

function isEmail(mail){
    var regEmail = new RegExp('^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$','i');
    return regEmail.test(mail);
}