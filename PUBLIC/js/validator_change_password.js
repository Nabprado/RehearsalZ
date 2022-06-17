import FormValidator from "./FormValidator.js";

document.addEventListener('DOMContentLoaded', () => {

    // constantes pour récupérer les boutons et la div correspondante au changement de mot de passe
    const btn_show_pwd = document.querySelector('#password');
    const btn_save_pwd = document.querySelector('#save_password');
    const pwd_div = document.querySelector('.change_password');
    const new_pwd = document.querySelector('#new_pwd');

    // variable pour stocker les éventuelles erreurs
    let error = "";

    // objet pour définir si le formulaire est valide ou non
    let cansubmit = {
        newPwd: false
    }

    // au clic sur le bouton, montrer la div qui permet de changer le mot de passe
    btn_show_pwd.addEventListener('click', (e) => {
        e.preventDefault();
        pwd_div.classList.toggle('show');
    })

    // vérification du nouveau mot de passe entré
    new_pwd.addEventListener('input', (e) => {
        if(FormValidator.IsInputEmpty(new_pwd) == true || !FormValidator.IsValidPassword(new_pwd)){
            error = "Password is not valid.";
            new_pwd.classList.add('invalid');
            new_pwd.nextElementSibling.classList.remove('hide');
            new_pwd.nextElementSibling.textContent = error;
            cansubmit.newPwd = false;
        } else if (FormValidator.IsInputEmpty(new_pwd) == false && FormValidator.IsValidPassword(new_pwd)) {
            new_pwd.classList.remove('invalid');
            new_pwd.nextElementSibling.classList.add('hide');
            cansubmit.newPwd = true;
            btn_save_pwd.disabled=false
        }
    })

    // si le formulaire est valide, on peut le soumettre
    btn_save_pwd.addEventListener('click', (e) => {
        if(cansubmit.newPwd == true){
            btn_save_pwd.disabled = false;
        } else {
            e.preventDefault();
            btn_save_pwd.disabled = true;
        }
    })
})