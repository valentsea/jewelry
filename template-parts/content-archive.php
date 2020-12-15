<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Jewelry
 */

?>
<div class="main	">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php	jewelry_post_thumbnail(); ?>

	<header class="entry-header">
	
			<div class="entry-meta">
			<?php
				the_time( 'j F' ); ?>,
			<?php	jewelry_posted_by();
				?>
			</div><!-- .entry-meta -->
			<?php

if ( is_singular() ) :
	the_title( '<h1 class="entry-title">', '</h1>' );
else :
	the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
endif;
if ( 'post' === get_post_type() ) :
	?>
		<?php endif; ?>

		<?php

		the_excerpt();

		// wp_link_pages(
		// 	array(
		// 		'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jewelry' ),
		// 		'after'  => '</div>',
		// 	)
		// );
		?>

		<div class='blog-links'> <a class='read-post' href="<?php esc_url( the_permalink() )?>">
			Read post
		</a>
		<a class='comments-link' href="<?php esc_url( the_permalink() )?>#comments">
		<?php echo get_comments_number()?>
		</a>
		</div>
	</header><!-- .entry-header -->

<hr>

</article><!-- #post-<?php the_ID(); ?> -->
	</div>