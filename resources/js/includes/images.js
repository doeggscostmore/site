import hero from '../../img/eggs-hero.jpg';
const heroImage = document.getElementById('hero-img')
if (heroImage) {
    heroImage.style.backgroundImage = "url(" + hero + ")";
}
