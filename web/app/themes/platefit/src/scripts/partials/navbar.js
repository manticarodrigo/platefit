import { getIsScrolled, getIsBreakpoint } from "../globals/utility";

let bodyAdminBar;
let navbar;
let navbarAnnouncements;
let navbarBackdrop;
let navbarToggle;

const onDomReady = () => {
  bodyAdminBar = document.querySelector(".admin-bar");
  navbar = document.querySelector('[data-component="navbar"]');
  navbarAnnouncements = document.querySelector(
    '[data-component="navbar-announcements"]'
  );
  navbarBackdrop = document.querySelector('[data-component="navbar-backdrop"]');
  navbarToggle = document.querySelector('[data-component="navbar-toggle"]');

  _watchNavbarHover();
  _watchNavbarBackdropClick();

  onScroll(); // set initial values if already scrolled
};

const onScroll = () => {
  _setNavbarTopMargin();
  _setNavbarOpacity(getIsScrolled());
};

const _setNavbarTopMargin = () => {
  if (!navbar) return;

  const announcementHeight = navbarAnnouncements ? 60 : 0;
  const adminBarHeight = bodyAdminBar && getIsBreakpoint("md") ? 46 : 0;

  const offset = announcementHeight + adminBarHeight;

  navbar.style.marginTop = `${Math.max(offset - window.pageYOffset, 0)}px`;
};

const _setNavbarOpacity = isSeeThrough => {
  if (!navbar) return;

  navbar.style.opacity = isSeeThrough ? 0.75 : 1;
};

const _watchNavbarHover = () => {
  if (!navbar) return;

  navbar.onmouseenter = () => _setNavbarOpacity(false);
  navbar.onmouseleave = () => _setNavbarOpacity(getIsScrolled());
};

const _watchNavbarBackdropClick = () => {
  if (!navbarBackdrop || !navbarToggle) return;

  navbarBackdrop.addEventListener("click", () => {
    navbarToggle.checked = false;
  });
};

export default {
  onDomReady,
  onScroll
};
