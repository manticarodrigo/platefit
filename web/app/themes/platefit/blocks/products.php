<section class="py-4 text-center" id="collection-<?php the_field('collection_id') ?>">
  <h3 class="h2 text-uppercase letter-spacing dark inline-block"><?php the_field('title') ?></h3>
  <div class="py-3 relative" style="min-height: 300px;" data-component="shopify-collection" data-collection="<?php the_field('collection_id') ?>">
    <div data-component="loader" style="position:absolute;top:50%;left:50%;transform:translate3d(-50%, -50%, 0);">
      <div class="loader">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
      </div>
    </div>
  </div>
</section>