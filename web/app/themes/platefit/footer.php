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


<!-- modals -->

<?php get_template_part('components/modals');  ?>

<!-- scroll to top -->

<a href="#" class="scroll-top" data-component="scroll-top">
  <p class="my-0 text-bold text-sm">Back to top</p>
  <svg>
    <use href="#arrow" /></svg>
</a>

<?php wp_footer(); ?>
</body>

</html>