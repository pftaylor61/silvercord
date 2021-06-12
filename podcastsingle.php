<?php
/**
 * 
 * Template Name: Podcast
 * Template Post Type: post, page, product
 * 
 * The Template for displaying podcast posts.
 *
 * @package Mercury
 * @since Mercury 0.0.1
 */

get_header(); ?>

	<div id="primary" class="site-content row sc_post" role="main">

			<div class="col grid_8_of_12">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'single' ); ?>
                            
                                        <?php echo "<p>". get_post_primary_category($post_ID)."</p>"; ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) {
						comments_template( '', true );
					}
					?>

					<?php mercury_content_nav( 'nav-below' ); ?>

				<?php endwhile; // end of the loop. ?>

			</div> <!-- /.col.grid_8_of_12 -->
			<?php get_sidebar(); ?>

	</div> <!-- /#primary.site-content.row -->

<?php get_footer(); ?>


