<footer class="p-5 container row text-center-lg footer">
  <div class="border-box p-4 p-2-sm col-4 col-1-lg">
    <svg class="footer__logo">
      <use href="#logo-grey"></use>
    </svg>
    <p class="mt-4 text-uppercase footer__slogan">This <br>is <br>where <br> i <span class="color-primary">fit</span></span></p>
  </div>
  <div class="border-box p-4 p-2-sm col-4 col-2-lg col-1-xs">
    <p class="mt-0 mb-4 text-uppercase footer__headline">Company</p>
    <nav>
      <ul class="pl-0 list-unstyled">
        <?php
        $menu_items = get_nav_menu_items_by_location('company');

        foreach ($menu_items as $item) {
          echo '<li class="mb-3"><a href="' . $item->url . '" title="' . $item->title . '">' . $item->title . '</a></li>';
        }
        ?>
      </ul>
    </nav>
  </div>
  <div class="border-box p-4 p-2-sm col-4 col-2-lg col-1-xs">
    <p class="mt-0 mb-4 text-uppercase footer__headline">Explore</p>
    <nav>
      <ul class="pl-0 list-unstyled">
        <?php
        $menu_items = get_nav_menu_items_by_location('explore');

        foreach ($menu_items as $item) {
          echo '<li class="mb-3"><a href="' . $item->url . '" title="' . $item->title . '">' . $item->title . '</a></li>';
        }
        ?>
      </ul>
    </nav>
  </div>
  <div class="border-box p-4 p-2-sm col-4 col-1-lg">
    <p class="mt-0 mb-4 text-uppercase footer__headline">Follow</p>
    <div class="mt-3 mb-4 row center-lg">
      <a class="footer__social-icon" href="https://www.facebook.com/PLATEFIT/">
        <svg width="18px" height="36px">
          <use href="#facebook" /></svg>
      </a>
      <a class="footer__social-icon" href="https://twitter.com/Platefit">
        <svg width="32px" height="26px">
          <use href="#twitter" /></svg>
      </a>
      <a class="footer__social-icon" href="https://www.instagram.com/platefit/">
        <svg width="32px" height="32px">
          <use href="#instagram" /></svg>
      </a>
    </div>
    <p class="mt-0 mb-4 text-uppercase footer__headline">Subscribe</p>
    <?php render_newsletter_form(); ?>
  </div>
</footer>

<!-- newsletter modal -->

<aside class="modal modal-slide" id="newsletter-modal" aria-hidden="true">
  <div class="modal__overlay" tabindex="-1" data-micromodal-close>
    <div class="px-4 px-2-sm modal__container bg-plate bg-modal" role="dialog" aria-modal="true" aria-labelledby="newsletter-modal-title">
      <header class="py-4 modal__header">
        <button class="modal__close" aria-label="Close dialog" data-micromodal-close></button>
      </header>
      <main class="modal__content" id="modal-1-content">
        <h2 class="mt-0 text-uppercase letter-spacing" id="newsletter-modal-title">
          Join the Community
        </h2>
        <p class="h3 h3--bold h3--sm line-height-none">
          We'll send you exclusive studio offers, upcoming events and more!
        </p>
        <?php render_newsletter_form(true) ?>
      </main>
      <footer class="py-4 modal__footer">
        <button class="link dark underline" data-micromodal-close aria-label="Close this newsletter dialog window">
          No thanks.
        </button>
      </footer>
    </div>
  </div>
</aside>

<!-- covid modal -->

<aside class="modal modal-slide" id="covid-modal" aria-hidden="true">
  <div class="modal__overlay" tabindex="-1" data-micromodal-close>
    <div class="px-4 py-4-sm modal__container bg-plate bg-modal" role="dialog" aria-modal="true" aria-labelledby="covid-modal-title">
      <header class="py-4 modal__header">
        <button class="modal__close" aria-label="Close dialog" data-micromodal-close></button>
      </header>
      <main class="modal__content pb-4" id="modal-1-content">
        <h2 class="my-0 text-uppercase letter-spacing" id="covid-modal-title">
          Join us online
        </h2>
        <p>
          Due to COVID-19, our studios are temporarily closed. Feel the vibration at home with our virtual full body workouts. No equipment necessary.
        </p>
        <p>
          Please provide your information below and to pre-register for our upcoming, on-demand subscription.
        </p>
        <?php render_covid_form() ?>
      </main>
      <footer class="py-4 modal__footer">
        <button class="link dark underline" data-micromodal-close aria-label="Close this newsletter dialog window">
          No thanks.
        </button>
      </footer>
    </div>
  </div>
</aside>

<!-- scroll to top -->

<a href="#" class="scroll-top" data-component="scroll-top">
  <p class="my-0 text-bold text-sm">Back to top</p>
  <svg>
    <use href="#arrow" /></svg>
</a>

<?php wp_footer(); ?>
</body>

</html>