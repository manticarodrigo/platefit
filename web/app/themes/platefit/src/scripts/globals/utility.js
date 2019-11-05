export const getIsScrolled = () => window.pageYOffset > 61;

export const getIsBreakpoint = (breakpoint) => {
  switch (breakpoint) {
    case 'xl':
      return window.innerWidth <= 1280;
    case 'lg':
      return window.innerWidth <= 950;
    case 'md':
      return window.innerWidth <= 750;
    case 'sm':
      return window.innerWidth <= 500;
    case 'xs':
      return window.innerWidth <= 375;
    default:
      return null;
  }
}
