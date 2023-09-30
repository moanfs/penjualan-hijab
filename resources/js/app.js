import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();

function toggleMenu() {
    const navMenu = document.querySelector('.nav-menu');

    navMenu.classList.toggle('hidden');
}

window.toggleMenu = toggleMenu;