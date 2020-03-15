import jQuery from 'jquery';

import './scripts/app';
import './app.scss';

import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import about from './routes/about';
import pricing from './routes/pricing';
import locations from './routes/locations';
import shop from './routes/shop';

/**
 * Populate Router instance with DOM routes
 * @type {Router} routes - An instance of our router
 */
const routes = new Router({
  /** All pages */
  common,
  /** Home page */
  home,
  /** About page */
  about,
  /** Pricing page */
  pricing,
  /** Locations page */
  locations,
  singleLocation: locations,
  /** Shop page */
  shop
});

/** Load Events */
jQuery(document).ready(() => routes.loadEvents());
