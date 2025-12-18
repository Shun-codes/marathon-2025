import './bootstrap';
import 'alpinejs/dist/cdn.min.js';
import '@fortawesome/fontawesome-free/js/all.js';

import.meta.glob([
    '../images/**',
    '../fonts/**',
]);

const burgerBtn = document.getElementById('burger-btn');
const  navBar = document.getElementById('nav-bar');

/*Barres */ 
const b1 = document.querySelector('.bar:nth-child(1)');
const b2 = document.querySelector('.bar:nth-child(2)');
const b3 = document.querySelector('.bar:nth-child(3)');

let textArea = document.getElementById('commentaireTarea');

    function afficherbar() {
        b1.style.transform = "translateY(0px) rotate(0deg)";
        b2.style.opacity = 1;
        b3.style.transform = "translateY(0px) rotate(0deg)";
    }

    function afficherCroix() {
        b1.style.transform = "translateY(8px) rotate(45deg)";
        b2.style.opacity = 0;
        b3.style.transform = "translateY(-8px) rotate(-45deg)";
        console.log('actifffff');
    }
        function aggrandirForm() {
        
    }

burgerBtn.addEventListener('click', () => {
    navBar.classList.toggle('Unactive');
    navBar.classList.toggle('active');
    if (navBar.classList.contains('active')) {
        afficherCroix();
    } else {
        afficherbar();
    } 
    });

    /*textArea.addEventListener('mouseenter', () => {
        textArea.style.width = "500px";  
        textArea.style.height = "150px"; 
    });

        textArea.addEventListener('mouseout', () => {
        textArea.style.width = "100%";   
        textArea.style.height = "20px"; 
    });
*/
