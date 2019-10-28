function isEmail(mail){
    var regEmail = new RegExp('^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$','i');
    return regEmail.test(mail);
}

$(document).ready(function(){
    $(".gif").fadeOut(4000, function(){
        $("#content").fadeIn(4000);
    });
})

$(document).on("click", ".openConfirm", function () {
    var value = $(this).data('email');
    name = $(this).data("name");
    $(".modal-body #confirm").val(value);
    document.getElementById('text').innerHTML = name;
});

$(document).on("click", ".openEdit", function () {
    var nom = $(this).data('nom'), prenom = $(this).data('prenom'), mail = $(this).data('mail'), pass = $(this).data('pass'), service = $(this).data('service'), specialite = $(this).data('specialite');
    $(".modal-body #lastname").val(nom);
    $(".modal-body #firstname").val(prenom);
    $(".modal-body #email").val(mail);
    $(".modal-body #password").val(pass);
    $(".modal-body #service").val(service);
    $(".modal-body #specialite").val(specialite);
});

function checkAllBox(ref, name){
    var elements = document.getElementsByTagName('input');

    for (var i = 0; i < elements.length; i++) {
        if (elements[i].type == 'checkbox' && elements[i].name == name) {
			elements[i].checked = ref.checked;
		}
    }
}

function deleteCheck(name){
    var elements = document.getElementsByTagName('input');
    var myArray = new Array();

    for (var i = 0; i < elements.length; i++) {
        if (elements[i].type == 'checkbox' && elements[i].name == name) {
			if(elements[i].checked == true){
                myArray.push(elements[i].value);
                $(".modal-body #check").val(myArray);
            }
		}
    }
}