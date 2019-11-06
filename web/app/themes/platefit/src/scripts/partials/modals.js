import MicroModal from 'micromodal';

function setCookie(name, value, days) {
  let expires = '';
  if (days) {
      const date = new Date();
      date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
      expires = '; expires=' + date.toUTCString();
  }
  document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}

function getCookie(name) {
  const nameEQ = name + '=';
  const ca = document.cookie.split(';');
  for (let i = 0; i < ca.length ; i++) {
      const c = ca[i];
      while (c.charAt(0) == ' ') c = c.substring(1,c.length);
      if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
  }
  return null;
}

const statusCookieName = 'newsletter-seen';
const statusCookieValue = 'seen';


const config = {
  awaitOpenAnimation: true,
  awaitCloseAnimation: true,
  onClose: () => setCookie(statusCookieName, statusCookieValue, 90),
};

const onDomReady = () => {
  // check if the modal has already been shown
  const hasSeenModal = getCookie(statusCookieName) === statusCookieValue;

  if (!hasSeenModal && document.querySelector('#newsletter-modal')) {
    MicroModal.init(config);
    MicroModal.show('newsletter-modal', config);
  }
};

export default {
  onDomReady,
}
