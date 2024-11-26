// App Code
import './includes/images'
import './includes/consent'

var offCanvas = document.getElementById('offcanvas');
var hamburger = document.getElementById('hamburger');

offCanvas.addEventListener('shown.bs.offcanvas', function () {
    hamburger.classList.add('is-active')
});
offCanvas.addEventListener('show.bs.offcanvas', function () {
    hamburger.classList.add('is-active')
});
offCanvas.addEventListener('hidden.bs.offcanvas', function () {
    hamburger.classList.remove('is-active')
});
offCanvas.addEventListener('hide.bs.offcanvas', function () {
    hamburger.classList.remove('is-active')
});