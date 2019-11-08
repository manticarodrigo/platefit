export default {
  init() {
    const interval = setInterval(() => {
      const params = new URLSearchParams(window.location.search); 

      if (!params) return;

      const firstTime = params.get('first_time');  
      const linkContainer = document.querySelector('[data-component="first-time-container"]');

      if (!firstTime || !linkContainer) return;

      const linkNode = linkContainer.querySelector('a');

      if (!linkNode) return;

      linkNode.click();

      clearInterval(interval);
    }, 250);
  },
  finalize() {}
}