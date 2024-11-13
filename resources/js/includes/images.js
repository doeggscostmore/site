import happy1 from '../../img/happy/happy1.jpeg';
import happy2 from '../../img/happy/happy2.jpeg';
import happy3 from '../../img/happy/happy3.jpeg';
import happy4 from '../../img/happy/happy4.jpeg';
import happy5 from '../../img/happy/happy5.jpeg';
import happy6 from '../../img/happy/happy6.jpeg';
import happy7 from '../../img/happy/happy7.jpeg';
import happy8 from '../../img/happy/happy8.jpeg';
import happy9 from '../../img/happy/happy9.jpeg';
import happy10 from '../../img/happy/happy10.jpeg';

import sad1 from '../../img/sad/sad1.jpeg';
import sad2 from '../../img/sad/sad2.jpeg';
import sad3 from '../../img/sad/sad3.jpeg';
import sad4 from '../../img/sad/sad4.jpeg';
import sad5 from '../../img/sad/sad5.jpeg';
import sad6 from '../../img/sad/sad6.jpeg';
import sad7 from '../../img/sad/sad7.jpeg';
import sad8 from '../../img/sad/sad8.jpeg';
import sad9 from '../../img/sad/sad9.jpeg';
import sad10 from '../../img/sad/sad10.jpeg';
import sad11 from '../../img/sad/sad11.jpeg';
import sad12 from '../../img/sad/sad12.jpeg';
import sad13 from '../../img/sad/sad13.jpeg';
import sad14 from '../../img/sad/sad14.jpeg';
import sad15 from '../../img/sad/sad15.jpeg';

const happyImages = [
    happy1,
    happy2,
    happy3,
    happy4,
    happy5,
    happy6,
    happy7,
    happy8,
    happy9,
    happy10,
];

const sadImages = [
    sad1,
    sad2,
    sad3,
    sad4,
    sad5,
    sad6,
    sad7,
    sad8,
    sad9,
    sad10,
    sad11,
    sad12,
    sad13,
    sad14,
    sad15,
];

var happyImageSrc = happyImages[Math.floor(Math.random()*happyImages.length)];
const happyImage = document.getElementById('picture-good');
if (happyImage) {
    happyImage.src = happyImageSrc;
}

var sadImageSrc = sadImages[Math.floor(Math.random()*sadImages.length)];
const sadImage = document.getElementById('picture-bad');
if (sadImage) {
    sadImage.src = sadImageSrc;
}

import hero from '../../img/eggs-hero.jpg';
const heroImage = document.getElementById('hero-img')
if (heroImage) {
    heroImage.style.backgroundImage = "url(" + hero + ")";
}
