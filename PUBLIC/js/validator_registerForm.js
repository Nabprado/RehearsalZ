import FormValidator from "./FormValidator.js";

document.addEventListener('DOMContentLoaded', () => {
    
    // constantes pour récupérer les input, le bouton submit et le formulaire
    const nickname = document.getElementById('nickname');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const r_password = document.getElementById('r_password');
    const btn = document.getElementById('submit');
    const registerForm = document.querySelector('.register_form');

    // variable pour stocker les éventuelles erreurs
    let error = "";

    // objet pour définir si le formulaire est valide ou non
    let cansubmit = {
        email: false,
        nickname: false,
        password: false,
        r_password: false
    };


    // vérification de l'email entré
    email.addEventListener("input", function (e){
        if(FormValidator.IsInputEmpty(email) == true || FormValidator.IsValidEmail(email) == false){
            error = "Email is not valid.";
            email.classList.add('invalid');
            email.nextElementSibling.classList.remove('hide');
            email.nextElementSibling.textContent = error;
            cansubmit.email = false;
        } else {
            email.classList.remove('invalid');
            email.nextElementSibling.classList.add('hide');
            cansubmit.email = true;
            btn.disabled=false
        }  
    });

    // vérification du pseudo entré
    nickname.addEventListener("input", function (e) {
        if(FormValidator.IsInputEmpty(nickname) == true){
            error = "Nickname is not valid.";
            nickname.classList.add('invalid');
            nickname.nextElementSibling.classList.remove('hide');
            nickname.nextElementSibling.textContent = error;
            cansubmit.nickname = false;
        } else {
            nickname.classList.remove('invalid');
            nickname.nextElementSibling.classList.add('hide');
            cansubmit.nickname = true;
            btn.disabled=false
        }
    });

    // vérification du password entré
    password.addEventListener("input", function (e) {
        if(FormValidator.IsInputEmpty(password) == true || !FormValidator.IsValidPassword(password)){
            error = "Password must be at least 8 characters and contain one MAJ and one number.";
            password.classList.add('invalid');
            password.nextElementSibling.classList.remove('hide');
            password.nextElementSibling.textContent = error;
            cansubmit.password = false;

        }else if(FormValidator.IsInputEmpty(password) == false && FormValidator.IsValidPassword(password)) {
            password.classList.remove('invalid');
            password.nextElementSibling.classList.add('hide');
            cansubmit.password = true;
            btn.disabled=false
        };
    });

    // vérification de la répétition du password entré
    r_password.addEventListener("input", function (e) {
        if(FormValidator.IsInputEmpty(r_password) == true || r_password.value != password.value){
            error = "You must repeat your password.";
            r_password.classList.add('invalid');
            r_password.nextElementSibling.classList.remove('hide');
            r_password.nextElementSibling.textContent = error;
            cansubmit.r_password = false;
        }else if(FormValidator.IsInputEmpty(r_password) == false && r_password.value == password.value) {
            r_password.classList.remove('invalid');
            r_password.nextElementSibling.classList.add('hide');
            cansubmit.r_password = true;
            btn.disabled=false
        };
    });


    // si le formulaire est valide, on peut le soumettre
    registerForm.addEventListener('submit', function(e){
        if(cansubmit.email == true && cansubmit.nickname == true && cansubmit.password == true && cansubmit.r_password == true){
            btn.disabled=false;
        } else {
            e.preventDefault();
            btn.disabled=true;
        }
    });
        

    
})