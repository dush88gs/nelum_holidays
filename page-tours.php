<?php
/*
Template Name: Tours
*/
?>

<?php get_header(); ?>

<?php
  $tours_featured = get_field('tours_featured');
?>

<section class="heading-section" style="background-image: url(<?php echo $tours_featured; ?>);">
  <div class="vertical-align">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        <h2 class="page-heading">Tours</h2>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
  $args = array(
    'post_type' => 'tour_packages',
    'post_status' => 'publish',
    'posts_per_page' => 9,
    'paged' => get_query_var('paged')
  );
  $tours_query = new WP_Query( $args );
?>

<section class="tour-packages">
  <div class="container">
    <div class="row">
    <?php if ( $tours_query->have_posts() ) : while ( $tours_query->have_posts() ) : $tours_query->the_post(); ?>
      <?php
        $tour_grid_img = get_field('tour_grid_img');
        $num_days = get_field('num_days');
        $num_people = get_field('num_people');
      ?>
      <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="tour-item">
          <div class="tour-grid-img" style="background-image: url('<?php echo $tour_grid_img; ?>')">
        
          </div>
          <div class="tour-grid-details">
            <h2><?php the_title(); ?></h2>
            <ul class="tour-grid-meta list-inline">
              <li class="list-inline-item"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;Days: <?php echo $num_days; ?></li>
              <li class="list-inline-item"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;People: <?php echo $num_people; ?></li>
            </ul>
            <a href="<?php echo get_post_permalink(); ?>" class="tour-item-btn bg-green">View Details</a>
          </div>
        </div>
      </div>
      <?php endwhile; else : ?>
        <p>There are no Tour Packages exist</p>
      <?php endif;
      wp_reset_postdata(); ?>
      <div class="container">
      <nav>
        <?php wp_pagenavi( array( 'query' => $tours_query ) ); ?>
      </nav>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>