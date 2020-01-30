export default {
  init() {
    const texts = document.querySelectorAll('[data-modifier="truncate"]');

    texts.forEach((node) => {
      const visibleText = node.innerHTML.substring(0, 150);
      const hiddenText = node.innerHTML.substring(150);

      const ellipsesMarkup = '<span data-modifier="ellipses">...</span>';
      const hiddenTextMarkup = `<span data-modifier="hidden-text" style="display: none;">${hiddenText}</span>`;

      node.innerHTML = `${visibleText}${ellipsesMarkup}${hiddenTextMarkup}`;
      
      node.nextElementSibling.addEventListener('click', function() {
        const hiddenTextNode = node.querySelector('[data-modifier="hidden-text"]');
        const ellipsesNode = node.querySelector('[data-modifier="ellipses"]');
        const toggleNode = this;

        if (hiddenTextNode.style.display === 'none') {
          hiddenTextNode.style.display = null;
          ellipsesNode.style.display = 'none';

          toggleNode.innerHTML = 'Read less';
        } else {
          hiddenTextNode.style.display = 'none';
          ellipsesNode.style.display = null;

          toggleNode.innerHTML = 'Read more';
        }
      });
    });
  },
  finalize() {}
}