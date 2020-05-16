<?php get_header(); ?>
<?php
$term = get_queried_object();
$attr_cat_featured = get_field('attr_cat_featured', $term);
?>

<section class="heading-section" style="background-image: url(<?php echo $attr_cat_featured; ?>">
  <div class="vertical-align">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        <h2 class="page-heading"><?php single_term_title(); ?></h2>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="slho-attractions-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
      <?php if(have_posts()) : while(have_posts()) : the_post();  ?>
        <?php
          $attraction_img_one = get_field('attraction_img_one');
          $attraction_img_two = get_field('attraction_img_two');
          $attraction_img_three = get_field('attraction_img_three');
          $attraction_des = get_field('attraction_des');
        ?>
        <div class="attraction-item">
          <h2 class="underline-heading"><?php the_title(); ?></h2>
          <div class="row">
            <div class="col-md-4">
              <img class="img-fluid" src="<?php echo $attraction_img_one['url']; ?>" alt="<?php echo $attraction_img_one['alt']; ?>">
            </div>
            <div class="col-md-4">
              <img class="img-fluid" src="<?php echo $attraction_img_two['url']; ?>" alt="<?php echo $attraction_img_two['alt']; ?>">
            </div>
            <div class="col-md-4">
              <img class="img-fluid" src="<?php echo $attraction_img_three['url']; ?>" alt="<?php echo $attraction_img_three['alt']; ?>">
            </div>
          </div>
          <?php echo $attraction_des; ?>
        </div>
        <hr class="slho-hr">
      <?php endwhile; else : ?>
          <p>There are no attractions under this category!</p>
      <?php endif;
      wp_reset_postdata(); ?>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>