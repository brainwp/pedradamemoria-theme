<?php
/**
HOME!
 */

get_header(); ?>


		<div id="primary">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'home' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

		<div id="primary">

		<div id="galerias">
		
					<?php
					 echo do_shortcode('[satellite post_id=777]');
					?>
		
		</div>
		
		</div><!-- #primary -->

<?php get_footer('pedradamemoria'); ?>
