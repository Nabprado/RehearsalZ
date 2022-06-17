import FormValidator from "./FormValidator.js";

document.addEventListener('DOMContentLoaded', () => {
    
    // constantes pour récupérer les input, le bouton submit et le formulaire
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const btn = document.getElementById('submit');
    const loginForm = document.querySelector('.login_form');

    // variable pour stocker les éventuelles erreurs
    let error = "";

    // objet pour définir si le formulaire est valide ou non
    let cansubmit = {
        email: false,
        password: false
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

    // vérification du mot de passe entré
    password.addEventListener("input", function (e) {
        if(FormValidator.IsInputEmpty(password) == true){
            error = "You must enter your password.";
            password.classList.add('invalid');
            password.nextElementSibling.classList.remove('hide');
            password.nextElementSibling.textContent = error;
            cansubmit.password = false;

        }else {
            password.classList.remove('invalid');
            password.nextElementSibling.classList.add('hide');
            cansubmit.password = true;
            btn.disabled=false
        };
    });

    // si le formulaire est valide, on peut le soumettre
    loginForm.addEventListener('submit', function(e){
        if(cansubmit.email == true && cansubmit.password == true){
            btn.disabled=false
        } else {
            e.preventDefault();
            btn.disabled=true
        }
    });

    
})