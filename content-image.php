<?php
/**
 * The template for displaying posts in the Image post format
 *
 * @package Mercury
 * @since Mercury 0.0.1
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php mercury_posted_on(); ?>
	</header> <!-- /.entry-header -->
	<div class="entry-content">
		<?php the_content( wp_kses( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'mercury' ), array( 
			'span' => array( 
				'class' => array() )
			) ) ); ?>
		<?php wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mercury' ),
			'after' => '</div>',
			'link_before' => '<span class="page-numbers">',
			'link_after' => '</span>'
		) ); ?>
	</div> <!-- /.entry-content -->

	<footer class="entry-meta">
		<?php if ( is_singular() ) {
			// Only show the tags on the Single Post page
			mercury_entry_meta();
		} ?>
		<?php edit_post_link( esc_html__( 'Edit', 'mercury' ) . ' <i class="fa fa-angle-right"></i>', '<div class="edit-link">', '</div>' ); ?>
		<?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) {
			// If a user has filled out their description and this is a multi-author blog, show their bio
			get_template_part( 'author-bio' );
		} ?>
	</footer> <!-- /.entry-meta -->
</article> <!-- /#post -->
