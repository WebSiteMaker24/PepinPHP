// MENU DEROULANT
const burgerMenu = document.getElementById("burger-menu");
const navLinks = document.getElementById("nav-links");

burgerMenu.addEventListener("click", () => {
    navLinks.classList.toggle("active");
});

// CAROUSEL
$(document).ready(function () {
    $(".owl-carousel").owlCarousel({
        loop: true,
        margin: 30,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        responsive: {
            0: { items: 1 },
            600: { items: 2 },
            1000: { items: 3 }
        }
    });
});

// Hauteur de la navbar
window.addEventListener('resize', adjustNavLinksPosition);
window.addEventListener('load', adjustNavLinksPosition);

function adjustNavLinksPosition() {
    const nav = document.querySelector('nav'); // Sélectionne le <nav>
    const navLinks = document.querySelector('.nav-links'); // Sélectionne .nav-links
    const navHeight = nav.offsetHeight; // Récupère la hauteur de la nav
    navLinks.style.top = `${navHeight}px`; // Applique cette hauteur à top
}

// ancre de scroll, affiche 150px plus haut l'ancre d'affichage
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener("click", function (e) {
        e.preventDefault();
        let targetId = this.getAttribute("href").substring(1);
        let targetElement = document.getElementById(targetId);
        if (targetElement) {
            let offset = 120; // Décalage de 150px
            let targetPosition = targetElement.offsetTop - offset;
            window.scrollTo({
                top: targetPosition,
                behavior: "smooth"
            });
        }
    });
});