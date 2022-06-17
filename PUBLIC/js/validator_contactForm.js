import FormValidator from "./FormValidator.js";

document.addEventListener('DOMContentLoaded', () => {
    
    // constantes pour récupérer les input, le bouton submit et le formulaire
    const firstName = document.getElementById('first_name');
    const lastName = document.getElementById('last_name');
    const email = document.getElementById('email');
    const message = document.getElementById('message');
    const btn = document.getElementsByClassName('submit');
    const contactForm = document.querySelector('.contact_form');

    // variable pour stocker les éventuelles erreurs
    let error = "";

    // objet pour définir si le formulaire est valide ou non
    let cansubmit = {
        firstName: false,
        lastName: false,
        email: false,
        message: false
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

    // vérification du prénom entré
    firstName.addEventListener("input", function (e) {
        if(FormValidator.IsInputEmpty(firstName) == true){
            error = "First name is not valid.";
            firstName.classList.add('invalid');
            firstName.nextElementSibling.classList.remove('hide');
            firstName.nextElementSibling.textContent = error;
            cansubmit.firstName = false;
        } else {
            firstName.classList.remove('invalid');
            firstName.nextElementSibling.classList.add('hide');
            cansubmit.firstName = true;
            btn.disabled=false
        }
    });

    // vérification du nom de famille entré
    lastName.addEventListener("input", function (e) {
        if(FormValidator.IsInputEmpty(lastName) == true){
            error = "Last name is not valid.";
            lastName.classList.add('invalid');
            lastName.nextElementSibling.classList.remove('hide');
            lastName.nextElementSibling.textContent = error;
            cansubmit.lastName = false;
        }else {
            lastName.classList.remove('invalid');
            lastName.nextElementSibling.classList.add('hide');
            cansubmit.lastName = true;
            btn.disabled=false
        };
    });

    // vérification du message entré
    message.addEventListener("input", function (e) {
        if(FormValidator.IsInputEmpty(message) == true){
            error = "You must enter a message...";
            message.classList.add('invalid');
            message.nextElementSibling.classList.remove('hide');
            message.nextElementSibling.textContent = error;
            cansubmit.message = false;
        }else {
            message.classList.remove('invalid');
            message.nextElementSibling.classList.add('hide');
            cansubmit.message = true;
            btn.disabled=false
        };
    });

    // si le formulaire est valide, on peut le soumettre
    contactForm.addEventListener('submit', function(e){
        e.preventDefault();
        if(cansubmit.firstName == true && cansubmit.lastName == true && cansubmit.email == true && cansubmit.message == true){
            btn.disabled=false;
            contactForm.submit();
            
        } else {
            btn.disabled=true
        }
    });

})