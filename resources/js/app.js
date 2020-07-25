require('./bootstrap');
require('./clipboard');

// Highlight code blocks
import hljs from 'highlight.js';

document.addEventListener('DOMContentLoaded', (event) => {
    document.querySelectorAll('pre code').forEach((block) => {
        hljs.highlightBlock(block);
    });
});

import SmoothScroll from 'smooth-scroll';

// Navigation scroll
new SmoothScroll('a[href*="#"]');
