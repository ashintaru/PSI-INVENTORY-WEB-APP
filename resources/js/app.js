import './bootstrap';


document.addEventListener('livewire:navigated', () => {
    // Mutate the HTML before the page is navigated away...
    initFlowbite();
})

import 'flowbite';
import 'flowbite-datepicker';



import Alpine from 'alpinejs';
import { initFlowbite } from 'flowbite';

window.Alpine = Alpine;

Alpine.start();

