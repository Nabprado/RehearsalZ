// class FormValidator contenant des méthodes pour la validation des formulaires

export default class FormValidator {

    // méthode pour vérifier si un input est vide
    static IsInputEmpty(input){
        if(input.value.length === 0){
            return true;
        }
        return false;
    };

    // méthode pour vérifier le format d'un email (text + @ + text + . + 2 ou 3 lettres)
    static IsValidEmail(input) {
        const emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

        if (input.value.match(emailRegex)) {
            return true;
        } else {
            return false;
        }
    };

    // méthode pour vérifier le format d'un mot de passe (text de minimum 8 caractères contenant 1 majuscule et 1 chiffre)
    static IsValidPassword(input) {
        const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;

        if (input.value.match(passwordRegex)) {
            return true;
        } else {
            return false;
        }
    };


}

