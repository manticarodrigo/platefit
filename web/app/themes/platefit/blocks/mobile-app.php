<section class="row bg-color-light">
  <div class="border-box p-6 p-4-lg col-2 col-1-md text-center-md">
    <h3 class="text-uppercase"><?php the_field('title') ?></h3>
    <p class="paragraph"><?php the_field('description') ?></p>
    <a class="mr-2 mr-0-sm mb-2 btn-img" target="_blank" href="<?php the_field('ios_link') ?>"><img src="/app/themes/platefit/src/assets/jpgs/app-ios.jpg"></a>
    <a class="mb-2 btn-img" target="_blank" href="<?php the_field('android_link') ?>"><img src="/app/themes/platefit/src/assets/jpgs/app-android.jpg"></a>
  </div>
  <div class="border-box p-6 p-4-lg col-2 col-1-md text-center">
    <img class="max-width-full" src="<?php the_field('image') ?>">
  </div>
</section>
