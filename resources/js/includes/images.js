import trumpImg1 from '../../img/trump-1.jpg';
import trumpImg2 from '../../img/trump-2.jpg';

const trumpImages = [
    trumpImg1,
    trumpImg2,
]

var randomImage = trumpImages[Math.floor(Math.random()*trumpImages.length)];

const badImage = document.getElementById('picture-bad');
if (badImage) {
    badImage.src = randomImage
}
