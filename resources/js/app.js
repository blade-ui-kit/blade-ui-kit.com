import './bootstrap';
import './clipboard';

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
