import Glide from '@glidejs/glide';
import { getIsBreakpoint } from '../globals/utility';

const onDomReady = () => {
  const sliderNodes = document.querySelectorAll('[data-component="slider"]');

  const getPeekSize = (size) => {
    if (getIsBreakpoint('sm')) {
      return 0;
    }

    if (getIsBreakpoint('lg')) {
      return size / 5;
    }

    return size;
  }

  [].forEach.call(sliderNodes, (node) => {
    const { peekSize = 0 } = node.dataset;

    const slider = new Glide(node, {
      type: 'carousel',
      perView: 1,
      peek: getPeekSize(parseInt(peekSize)),
    });
  
    slider.mount();
  });
};

export default {
  onDomReady,
};
