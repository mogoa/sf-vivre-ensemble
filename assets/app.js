
// enable the interactive UI components from Flowbite


/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';
import './stimulus_bootstrap.js';
import 'flowbite';
import './js/carousel.js';


import Alpine from 'alpinejs'
import collapse from '@alpinejs/collapse'
window.Alpine = Alpine
Alpine.plugin(collapse)
Alpine.start()

// Carousel behaviour (Flowbite)
import './js/carousel.js'
