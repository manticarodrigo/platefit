import Glide from '@glidejs/glide';
import { getIsBreakpoint } from '../globals/utility';

const onDomReady = () => {
  const sliderNodes = document.querySelectorAll('[data-component="slider"]');

  const getPeekSize = () => {
    if (getIsBreakpoint('sm')) {
      return 0;
    }

    if (getIsBreakpoint('lg')) {
      return 50;
    }

    return 250;
  }

  [].forEach.call(sliderNodes, (node) => {
    const slider = new Glide(node, {
      type: 'carousel',
      perView: 1,
      peek: getPeekSize(),
    });
  
    slider.mount();
  });
};

export default {
  onDomReady,
};
