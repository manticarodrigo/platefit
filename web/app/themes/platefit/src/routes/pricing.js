export default {
  init() {
    const interval = setInterval(() => {
      const params = new URLSearchParams(window.location.search); 

      if (!params) return;

      const firstTime = params.get('mb_link');  
      const linkContainer = document.querySelector('[data-component="mindbody-modal"]');

      if (!firstTime || !linkContainer) return;

      const linkNode = linkContainer.querySelector('a');

      if (!linkNode) return;

      linkNode.click();

      clearInterval(interval);
    }, 250);
  },
  finalize() {}
}