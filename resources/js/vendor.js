import { Tooltip, Collapse } from 'bootstrap';

// Tooltips
document.querySelectorAll('[data-toggle="tooltip"]')
    .forEach(element => {
        new Tooltip(element)
    })