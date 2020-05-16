<?php
/*
Template Name: About Sri Lanka
*/
?>

<?php get_header(); ?>

<?php
  $about_sl_featured = get_field('about_sl_featured');
  $sl_heading = get_field('sl_heading');
  $sl_description = get_field('sl_description');
  $hc_heading = get_field('hc_heading');
  $hc_description = get_field('hc_description');
  $wc_heading = get_field('wc_heading');
  $wc_description = get_field('wc_description');
?>

<section class="heading-section" style="background-image: url(<?php echo $about_sl_featured; ?>);">
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

  <section class="sri-lanka-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="about-sri-lanka">
            <h2 class="underline-center-heading"><?php echo $sl_heading; ?></h2>
              <?php echo $sl_description; ?>
              <hr class="mt-5 mb-5">
              <h2 class="underline-center-heading"><?php echo $hc_heading; ?></h2>
              <?php echo $hc_description; ?>
              <hr class="mt-5 mb-5">
              <h2 class="underline-center-heading"><?php echo $wc_heading; ?></h2>
              <?php echo $wc_description; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php get_footer(); ?>