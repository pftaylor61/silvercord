<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Mercury
 * @since Mercury 0.0.1
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( !is_front_page() ) { ?>
		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php if ( has_post_thumbnail() && !is_search() && !post_password_required() ) { ?>
				<?php the_post_thumbnail( 'post_feature_full_width' ); ?>
			<?php } ?>
		</header>
	<?php } ?>
	<div class="entry-content">
		<span class="ocws_date_style"><?php the_date(); ?></span></br />
		<?php if ( get_the_category() ) : ?>
                  <span class="ocws_date_style"><?php the_category( ' ' ); ?></span><br /><br />
        <?php endif; // get_the_category() ?> 
		<?php the_content(); ?>
		<?php wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mercury' ),
			'after' => '</div>',
			'link_before' => '<span class="page-numbers">',
			'link_after' => '</span>'
		) ); ?>
	</div><!-- /.entry-content -->
	<footer class="entry-meta">
		<?php edit_post_link( esc_html__( 'Edit', 'mercury' ) . ' <i class="fa fa-angle-right"></i>', '<div class="edit-link">', '</div>' ); ?>
	</footer><!-- /.entry-meta -->
</article><!-- /#post -->
