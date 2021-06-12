<?php 
/**
 * @package Silvercord
 */
$featured_posts = mercury_get_featured_posts();
?>
<?php if ( $featured_posts->have_posts() ) : $featured_posts->the_post(); ?>
<div class="featured-content">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if ( has_post_thumbnail() ) : ?>
		<div class="entry-thumbnail">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'mercury-featured' ); ?></a>
                       
		</div>
		<?php endif; ?>

		<header class="entry-header">
			<!-- code for the main featured article, number 1 -->
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'mercury' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		</header><!-- .entry-header -->

		<div class="entry-summary">
						<?php if ( get_the_date() ) : ?>
						<span class="first-thumbnail-category"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'mercury' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_date(); ?></a></span><br />
						<?php endif; // get_the_date() ?>
                        <?php if ( get_the_category() ) : ?>
                        <span class="first-thumbnail-category"><?php the_category( ' ' ); ?></span><br /><br />
                        <?php endif; // get_the_category() ?>  
			<?php the_excerpt(); ?>
			<p><a class="button-primary" href="<?php the_permalink(); ?>"><?php _e( 'Continue reading &rarr;', 'mercury' ); ?></a></p>
		</div><!-- .entry-summary -->

		<div class="clear"></div>

	</article>

</div><!-- .featured-content -->

<?php if ( $featured_posts->have_posts() ) : // more than one? ?>
<div class="featured-content-secondary">
	<?php while ( $featured_posts->have_posts() ) : $featured_posts->the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php if ( has_post_thumbnail() ) : ?>
			<div class="entry-thumbnail">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>

				<?php if ( get_the_date() ) : ?>
						<span class="entry-thumbnail-category"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'mercury' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_date(); ?></a></span><br />
						<?php endif; // get_the_date() ?>
				<?php if ( get_the_category() ) : ?>
				<span class="entry-thumbnail-category"><?php the_category( ' ' ); ?></span>
				<?php endif; // get_the_category() ?>
			</div>
			<?php endif; ?>

			<header class="entry-header">
				<!-- code for four featured articles, numbers 2 through 5 -->
				<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'mercury' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			</header><!-- .entry-header -->

			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		</article>

		<?php if ( $featured_posts->current_post % 4 == 0 ) : ?>
			<div class="clear"></div>
		<?php endif; // % 4 ?>

	<?php endwhile; ?>
</div><!-- .featured-content-secondary -->
<?php endif; // have_posts() inner ?>
<?php endif; // have_posts() ?>
