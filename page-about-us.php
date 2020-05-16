<?php
/*
Template Name: About Us
*/
?>

<?php get_header(); ?>

<?php
  $about_featured = get_field('about_featured');
  $about_title = get_field('about_title');
  $about_description = get_field('about_description');
?>

<section class="heading-section" style="background-image: url(<?php echo $about_featured; ?>);">
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

<section class="about-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12">
        <h2 class="underline-center-heading"><?php echo $about_title; ?></h2>
        <div class="about-overlay">
          <?php echo $about_description; ?>
          <p class="about-owner">~ Chamith and Dilani ~</p>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>