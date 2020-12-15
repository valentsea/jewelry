<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Jewelry
 */

get_header();
?>

<?php
if(is_front_page() || is_home()) {
    // This is a homepage
?>
    <main class="main">
<div class="mainpage-text">
  <h2>
    
    <?php 
    $fieldName = get_field('main-heading', 'option');
    if( $fieldName ): echo $fieldName;
   else: echo $fieldName["default_value"]; 
   	endif;  ?> 

  
</h2>
   <p>   <?php 
    $fieldName = get_field('text_field', 'option');
    if( $fieldName ): echo $fieldName;
   else: echo $fieldName["default_value"]; 
   	endif;?>
    </p>
</div>

<?php 
$images = get_field('mainSlider', 'option');
$size = 'full'; // (thumbnail, medium, large, full or custom size)
if( $images ): ?>
<div class="slider">
  <div class="swiper-container">
    <div class="swiper-wrapper">


        <?php foreach( $images as $image_id ): ?>
            <div class="swiper-slide">
                <?php echo wp_get_attachment_image( $image_id, $size ); ?>
            </div>
        <?php endforeach; ?>
        </div>
  </div>
  <!-- Add Arrows -->
  <div class="swiper-button-next"></div>
  <div class="swiper-button-prev"></div>
</div>
<?php endif; ?>


<div class="socialBlock">
  <a href="<?php the_field('inst', 'option');?>"><img src="<?php echo get_stylesheet_directory_uri() ?>/img/inst.png" alt="inst" /></a>
  <a href="<?php the_field('pinterest', 'option');?>"><img src="<?php echo get_stylesheet_directory_uri() ?>/img/pint.png" alt="pinterest" /></a>
  <a href="<?php the_field('fb', 'option');?>"><img src="<?php echo get_stylesheet_directory_uri() ?>/img/fb.png" alt="fb" /></a>
</div>

<div class="block">
  <div class="block__inner">
    When You Are in Jewelry, I Know <span>Who You Are</span>
  </div>
</div>





</main> 
<?php
} elseif ( is_home()){
    ?>
<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
        ?>
<?php
} else {
    ?>
    <main id="primary" class="container">

    <?php
    while ( have_posts() ) :
        the_post();

        get_template_part( 'template-parts/content', 'page' );

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;

    endwhile; // End of the loop.
    ?>

</main><!-- #main -->
<?php }
?>



<?php
get_sidebar();
get_footer();
