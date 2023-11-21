import './bootstrap';
import 'flowbite';
import 'flowbite-datepicker';

import Alpine from 'alpinejs';
import { initFlowbite } from 'flowbite';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('livewire:navigated', () => {
    // ...
    initFlowbite();
});
