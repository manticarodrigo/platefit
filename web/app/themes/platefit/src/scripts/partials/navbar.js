import { getIsScrolled } from '../globals/utility';

let navbar;
let navbarBackdrop;
let navbarToggle;

const onDomReady = () => {
  navbar = document.querySelector('[data-component="navbar"]');
  navbarBackdrop = document.querySelector('[data-component="navbar-backdrop"]');
  navbarToggle = document.querySelector('[data-component="navbar-toggle"]');

  _watchNavbarHover();
  _watchNavbarBackdropClick();
};

const onScroll = () => _setNavbarOpacity(getIsScrolled());

const _setNavbarOpacity = (isSeeThrough) => {
  if (!navbar) return;

  navbar.style.opacity = isSeeThrough ? 0.75 : 1;
};

const _watchNavbarHover = () => {
  if (!navbar) return;

  navbar.onmouseenter = () => _setNavbarOpacity(false);
  navbar.onmouseleave = () => _setNavbarOpacity(getIsScrolled());
}

const _watchNavbarBackdropClick = () => {
  if (!navbarBackdrop || !navbarToggle) return;

  navbarBackdrop.addEventListener('click', () => {
    navbarToggle.checked = false;
  })
};

export default {
  onDomReady,
  onScroll,
};
