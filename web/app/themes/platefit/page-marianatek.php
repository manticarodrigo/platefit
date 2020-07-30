<?php
/* Template Name: Mariana Tek */
get_header();
?>

	<main class="px-4 px-3-md px-2-sm overflow-hidden relative container" role="main" aria-label="Main content">

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<?php the_content(); ?>

		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

			</article>
			<!-- /article -->

		<?php endif; ?>

	</main>

<script>
(function() {
// Set tenant name here
var TENANT_NAME = 'platefit';
var d = document;
var sA = ['polyfills', 'js'];
for (var i = 0; i < sA.length; i++) { var s = d.createElement('script');
s.src = 'https://' + TENANT_NAME + '.marianaiframes.com/' + sA[i];
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s); }
})();
 </script>
 <noscript>
     Please enable JavaScript to view the
<a href="https://marianatek.com/?ref_noscript" rel="nofollow"> Web Integrations by Mariana Tek.
     </a>
 </noscript>

<?php get_footer(); ?>