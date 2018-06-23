<?php
/*
Template Name: Archives
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<h2><span class="floral">b</span></h2>
					<div class="entry-page-title">
						<h1 class="entry-title"><?php the_title(); ?></h1>	
					</div>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<h2>Archives by Month:</h2>
					<ul>
						<?php wp_get_archives('type=monthly'); ?>
					</ul>
					
					<h2>Archives by Subject:</h2>
					<ul>
						 <?php wp_list_categories(); ?>
					</ul>
				</div><!-- .entry-content -->

				<footer class="entry-footer"><div class="entry-bottom smallPart"></div></footer>
			</article>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
