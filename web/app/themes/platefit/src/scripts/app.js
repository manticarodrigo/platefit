import Navbar from './partials/navbar';
import Video from './partials/video';
import SmoothScroll from './partials/smooth-scroll';
import Parallax from './partials/parallax';
import Modals from './partials/modals';
import Sliders from './partials/sliders';
import './partials/maps';

const onScroll = () => {
  Navbar.onScroll();
  SmoothScroll.onScroll();
};

const onDomReady = () => {
  Navbar.onDomReady();
  Video.onDomReady();
  SmoothScroll.onDomReady();
  Parallax.onDomReady();
  Modals.onDomReady();
  Sliders.onDomReady();
};

document.addEventListener('DOMContentLoaded', onDomReady);
window.addEventListener('scroll', onScroll);
