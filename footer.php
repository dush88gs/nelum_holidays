<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nelum_Holidays
 */

?>

<footer>
    <?php
      $footer_phone = get_field('footer_phone', 'option');
      $footer_email = get_field('footer_email', 'option');
      $footer_skype = get_field('footer_skype', 'option');
      $footer_social = get_field('footer_social', 'option');
    ?>
    <section class="footer-row">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-6">
            <h4>Book by phone :</h4>
            <ul class="fa-ul footer-list">
              <li><i class="fa-li fa fa-phone" aria-hidden="true"></i>&nbsp;<a href="tel:<?php echo $footer_phone; ?>"><?php echo $footer_phone; ?></a></li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 col-6">
            <h4>Write to us :</h4>
            <ul class="fa-ul footer-list">
              <li><i class="fa-li fa fa-envelope" aria-hidden="true"></i>&nbsp;<a href="mailto:<?php echo $footer_email; ?>">Email Us</a></li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 col-6">
            <h4>Chat on Skype :</h4>
            <ul class="fa-ul footer-list">
              <li><i class="fa-li fa fa-skype" aria-hidden="true"></i>&nbsp;<a href="skype:<?php echo $footer_skype; ?>?chat"><?php echo $footer_skype; ?></a></li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 col-6">
            <h4>We are social :</h4>
            <?php
              $footer_fb = $footer_social['footer_fb'];
              $footer_insta = $footer_social['footer_insta'];
              $footer_pinterest = $footer_social['footer_pinterest'];
              $footer_twitter = $footer_social['footer_twitter'];
            ?>
            <ul class="list-inline footer-social">
              <li class="list-inline-item"><a href="<?php echo $footer_fb; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li class="list-inline-item"><a href="<?php echo $footer_insta; ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
              <li class="list-inline-item"><a href="<?php echo $footer_pinterest; ?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
              <li class="list-inline-item"><a href="<?php echo $footer_twitter; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <div class="bottom-bar">
      <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> &bull; Solution by <a href="https://digitecz.com" target="_blank"><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/img/digitecz-footer.svg" width="auto" height="20"></a></p>
    </div>
  </footer>

  <script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/jquery.min.js"></script>
  <script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/jquery.fancybox.min.js"></script>
  <script src="<?php echo get_bloginfo('template_directory'); ?>/assets/packages/owl-carousel/dist/owl.carousel.min.js"></script>
  <script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/sina-nav.js"></script>
  <script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/main.js"></script>

  <?php wp_footer(); ?>
</body>
</html>
