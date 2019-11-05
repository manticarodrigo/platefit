const onDomReady = () => {
  const video = document.querySelector('video');
  const videoContainer = document.querySelector('.video-container');
  
  const toggleVideo = () => {
    if (video.paused === true) {
      video.play();
      videoContainer.classList.add('is-playing');
    } else {
      video.pause();
      videoContainer.classList.remove('is-playing');
    }
  };

  const onKeyUp = (e) => {
    if (e && event.keyCode !== 13) return;

    toggleVideo();
  }

  if (video && videoContainer) {
    videoContainer.addEventListener('click', toggleVideo);
    videoContainer.addEventListener('keyup', onKeyUp);
  }
};

export default {
  onDomReady,
};
