$(document).ready(function(){
    $(".gif").fadeOut(9000, function(){
        $("#content").fadeIn(9000);
    });
})

function traitementJS(){
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var erreurMail = document.getElementById("emailHelp");
    var erreurPassword = document.getElementById("passwordHelp");

    if(email === ""){
        erreurMail.classList.remove("hide")
        erreurMail.innerHTML += '<p>Veillez indiquer votre adresse mail svp</p>'
    }
    if(password === ""){
        erreurPassword.classList.remove("hide")
        erreurPassword.innerHTML += '<p>Veillez indiquer votre mot de passe svp</p>'
    }
    if (password.length < 8){
        erreurPassword.classList.remove("hide")
        erreurPassword.innerHTML += '<p>Mot de passe incorrecte</p>'
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