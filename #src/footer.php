<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Jewelry1
 */

?>

<footer class="footer" id="contacts">
  <div class="footer__container container">
    <div class="footer__left">
      <a href=""><img src="<?php echo get_stylesheet_directory_uri() ?>/img/footerLogo.png" alt="DJ"></a>
      <ul class="footer__info">
        <li class="footer__infoitem"><a href="<?php the_field('inst');?>"> instagram</a></li>
        <li class="footer__infoitem"><a href="<?php the_field('pinterest');?>">facebook</a></li>
        <li class="footer__infoitem"><a href="<?php the_field('fb');?>">pinterest</a></li> 
      </ul>
    </div>
      <form class="email_form" action="submit">
        <input type="email" placeholder="Enter email" name="email" id="2" />
      <button type="submit">Subscribe</button>
      </form>
    </div>
  </div>
</footer>
</div>
</div>
<?php wp_footer(); ?>
 
</body>
</html>
