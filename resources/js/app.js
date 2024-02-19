import Alpine from 'alpinejs';
import './bootstrap';
import './clipboard';

// Alpine.js
window.Alpine = Alpine;

Alpine.start();

// Highlight code blocks
import hljs from 'highlight.js';

document.addEventListener('DOMContentLoaded', (event) => {
    document.querySelectorAll('pre code').forEach((block) => {
        hljs.highlightElement(block);
    });
});

// Navigation scroll
import SmoothScroll from 'smooth-scroll';

new SmoothScroll('a[href*="#"]');
