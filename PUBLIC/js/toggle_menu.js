// menu burger

// constantes pour sélectionner la navbar et le bouton burger
const navbar = document.querySelector('.navbar');
const burger = document.querySelector('.burger');

// fonction toggleMenu (montre ou cache la navbar au clic sur le bouton burger)
export function toggleMenu() {
    burger.addEventListener('click', (e) => {

        navbar.classList.toggle('show_nav');

    })
};




