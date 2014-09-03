<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

		<div id="aba-filme">
		
					<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		
		</div><!-- #aba-exposicao -->

		<div id="primary">
		
		<div id="vimeo">
		
        <iframe src="http://player.vimeo.com/video/52105894?byline=0&amp;badge=0&amp;color=ff9933&amp;autoplay=0" width="800" height="450" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
		
		</div>
		
		</div><!-- #primary -->

<?php get_footer('pedradamemoria'); ?>