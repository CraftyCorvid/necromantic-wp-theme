<?php
/**
 * @package nucleare
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		if ( '' != get_the_post_thumbnail() ) {
			echo '<figure class="entry-featuredImg">';
			the_post_thumbnail('nucleare-normal-post');
			echo '</figure>';
		}
	?>
	<header class="entry-header">
		<?php nucleare_entry_category(); ?>
	    <h2>
	    <span class="floral">a</span>
	    </h2>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links smallPart">' . esc_html__( 'Pages:', 'nucleare' ) . '<span>',
				'after'  => '</span></div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php nucleare_entry_footer(); ?>
	    <div class="entry-bottom smallPart"><?php nucleare_posted_on(); ?></div>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
