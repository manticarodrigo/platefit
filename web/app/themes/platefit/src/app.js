import jQuery from 'jquery';

import './scripts/app';
import './app.scss';

import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import locations from './routes/locations';

/**
 * Populate Router instance with DOM routes
 * @type {Router} routes - An instance of our router
 */
const routes = new Router({
  /** All pages */
  common,
  /** Home page */
  home,
  /** Locations page */
  locations,
  singleLocation: locations,
});

/** Load Events */
jQuery(document).ready(() => routes.loadEvents());
