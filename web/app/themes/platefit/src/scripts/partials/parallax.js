import { jarallax } from 'jarallax';
import { getIsBreakpoint } from '../globals/utility';

const onDomReady = () => {
  const coverElements = document.querySelectorAll('[data-parallax="cover"]');
  const containElements = document.querySelectorAll('[data-parallax="contain"]');

  jarallax(coverElements, { speed: 0.5 });
  jarallax(containElements, { speed: 0.8, imgSize: getIsBreakpoint('lg') ? '90%' : '60%' });
};

export default {
  onDomReady,
};
