<?php
/*
Template Name: Contact Us
*/
?>

<?php
  $contact_featured = get_field('contact_featured');
  $c_location = get_field('c_location');
  $c_phone = get_field('c_phone');
  $c_email = get_field('c_email');
  $c_hot_line = get_field('c_hot_line');
  $c_fax = get_field('c_fax');
  $c_map = get_field('c_map');
?>

<?php get_header(); ?>

<section class="heading-section" style="background-image: url(<?php echo $contact_featured; ?>);">
  <div class="vertical-align">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        <h2 class="page-heading"><?php the_title(); ?></h2>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="contact-section">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
      <?php echo do_shortcode( '[contact-form-7 id="48" title="Contact page form"]' ); ?>
      </div>
      <div class="col-md-6">
        <div class="row contact-boxes">
          <div class="col-md-12 col-sm-12 nh-location">
            <h3><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Location</h3>
            <p><?php echo $c_location; ?></p>
          </div>
          <div class="col-md-6 col-sm-6 nh-phone">
            <h3><i class="fa fa-mobile" aria-hidden="true"></i>&nbsp;Phone</h3>
            <p><?php echo $c_phone; ?></p>
          </div>
          <div class="col-md-6 col-sm-6 nh-email">
            <h3><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;E-mail</h3>
            <p><?php echo $c_email; ?></p>
          </div>
          <div class="col-md-6 col-sm-6 nh-hot-line">
            <h3><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;Hot Line</h3>
            <p><?php echo $c_hot_line; ?></p>
          </div>
          <div class="col-md-6 col-sm-6 nh-fax">
            <h3><i class="fa fa-fax" aria-hidden="true"></i>&nbsp;Fax</h3>
            <p><?php echo $c_fax; ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="map-section">
  <?php echo $c_map; ?>
</section>

<?php get_footer(); ?>