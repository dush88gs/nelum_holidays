<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

<?php
  $ayubowan_heading = get_field('ayubowan_heading');
  $ayubowan_des = get_field('ayubowan_des');
  $why_sl_heading = get_field('why_sl_heading');
  $why_sl_des = get_field('why_sl_des');
  $why_sl_img = get_field('why_sl_img');
  $why_nh_heading = get_field('why_nh_heading');
  $why_nh_des = get_field('why_nh_des');
  $why_nh_img = get_field('why_nh_img');
  $video_des = get_field('video_des');
  $video_link = get_field('video_link');
?>

  <section>
    <?php echo do_shortcode( '[mpsl home-slider]' ); ?>
  </section>
  
  <section class="slho-home-form">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <?php echo do_shortcode( '[contact-form-7 id="346" title="Home page form"]' ); ?>
        </div>
      </div>
    </div>
  </section>

  <section class="welcome-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        <h2 class="underline-center-heading"><?php echo $ayubowan_heading; ?></h2>
        <p><?php echo $ayubowan_des; ?></p>
        <a href="<?php echo get_site_url(); ?>/about-us" class="slho-btn bg-green">About Us</a>
        </div>
      </div>
    </div>
  </section>

  <section class="featured-section">
    <div class="container">
      <div class="featured-heading-wrapper">
        <h2 class="underline-heading">Featured Tours</h2>
        <div class="slho-owl-btn-wrapper">
          <button id="featuredPrevBtn" type="button" class="btn btn-primary"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
          <button id="featuredNextBtn" type="button" class="btn btn-primary"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
        </div>
      </div>
      <div id="featured-tours-slider" class="owl-carousel owl-theme">
        <?php
          $args = array(
            'post_type' => 'tour_packages',
            'post_status' => 'publish',
            'orderby'=> 'date',
            'order' => 'DESC',
            'posts_per_page' => -1,
            'meta_query' => array(
              array(
                'key' => 'is_featured_tour',
                'value' => '1',
                'compare' => '=='
              )
            )
          );

          $featured_query = new WP_Query( $args );
        ?>

        <?php if ( $featured_query->have_posts() ) : while ( $featured_query->have_posts() ) : $featured_query->the_post(); ?>
          <?php
            $tour_grid_img = get_field('tour_grid_img');
            $num_days = get_field('num_days');
            $num_people = get_field('num_people');
          ?>
          <div class="tour-item">
            <div class="tour-grid-img" style="background-image: url('<?php echo $tour_grid_img; ?>')"></div>
            <div class="tour-grid-details">
              <h2><?php the_title(); ?></h2>
              <ul class="tour-grid-meta list-inline">
                <li class="list-inline-item"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;Days:&nbsp;<?php echo $num_days; ?></li>
                <li class="list-inline-item"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;People:&nbsp;<?php echo $num_people; ?></li>
              </ul>
              <a href="<?php echo get_post_permalink(); ?>" class="tour-item-btn bg-green">View Details</a>
            </div>
          </div>
        <?php endwhile; else : ?>
					<p>There are no Featured Tours exist</p>
				<?php endif;
				wp_reset_postdata(); ?>
      </div>
    </div>
  </section>

  <section class="why-section">
    <div class="container">
      <ul class="nav nav-pills justify-content-center" id="why-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="sl-tab" data-toggle="tab" href="#why-sl" role="tab" aria-controls="home"
            aria-selected="true">Why Sri Lanka</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="nh-tab" data-toggle="tab" href="#why-nh" role="tab" aria-controls="profile"
            aria-selected="false">Why Book with Nelum Holidays</a>
        </li>
      </ul>
    
      <div class="tab-content">
        <div class="tab-pane active" id="why-sl" role="tabpanel" aria-labelledby="sl-tab">
          <div class="row">
            <div class="col-lg-8 col-md-12">
              <h4><?php echo $why_sl_heading; ?></h4>
              <?php echo $why_sl_des; ?>
            </div>
            <div class="col-lg-4 d-lg-block d-none">
              <img src="<?php echo $why_sl_img['url']; ?>" class="img-fluid rounded-circle" width="100%" height="auto" alt="<?php echo $why_sl_img['alt']; ?>">
            </div>
          </div>
        </div>
        <div class="tab-pane" id="why-nh" role="tabpanel" aria-labelledby="nh-tab">
          <div class="row">
            <div class="col-lg-8 col-md-12">
              <h4><?php echo $why_nh_heading; ?></h4>
              <?php echo $why_nh_des; ?>
            </div>
            <div class="col-lg-4 d-lg-block d-none">
              <img src="<?php echo $why_nh_img['url']; ?>" class="img-fluid rounded-circle" alt="<?php echo $why_nh_img['alt']; ?>">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="services-section">
    <div class="container">
      <h2 class="underline-heading">Our Services</h2>
    </div>
    <div class="parallax-services parallax" style="background-image: url('<?php echo get_bloginfo('template_directory'); ?>/assets/img/home/parallax-service.jpg');">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h5>Our Friendly and Affordable services include :</h5>
            <?php if( have_rows('services_list') ): ?>
              <ul class="fa-ul services-list">
                <?php while( have_rows('services_list') ): the_row(); 
                  $our_services = get_sub_field('our_services');
                ?>
                  <li><i class="fa-li fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;<?php echo $our_services; ?></li>
                <?php endwhile; ?>
              </ul>
            <?php endif; ?>
            <div class="text-center">
              <a href="<?php echo get_site_url(); ?>/about-us" class="slho-btn bg-green">Discover More</a>
            </div>
          </div>
          <div class="col-md-6">
            <img class="services-person" src="<?php echo get_bloginfo('template_directory'); ?>/assets/img/home/services-person.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php
    $args = array(
      'post_type' => 'testimonials',
      'post_status' => 'publish',
      'orderby'=> 'title',
      'order' => 'ASC'
    );

    $testimonial_query = new WP_Query( $args );
  ?>

  <section class="testimonial-section">
    <div class="container">
      <h2 class="underline-heading">Our Client’s Words</h2>
      <div id="testimonial-slider" class="owl-carousel owl-theme">
      <?php if ( $testimonial_query->have_posts() ) : while ( $testimonial_query->have_posts() ) : $testimonial_query->the_post(); ?>

      <?php
        $testimonial_img = get_field('testimonial_img');
        $testimonial_person = get_field('testimonial_person');
        $testimonial_des = get_field('testimonial_des');
      ?>
        <div class="testimonial-item media border">
          <img src="<?php echo $testimonial_img['url']; ?>" alt="<?php echo $testimonial_img['alt']; ?>" class="rounded-circle">
          <div class="media-body">
            <p><?php echo $testimonial_des; ?></p>
            <small><?php echo $testimonial_person; ?></small>
          </div>
        </div>
      <?php endwhile; else : ?>
          <p>There are no Testimonials exist</p>
      <?php endif;
      wp_reset_postdata(); ?>
      </div>
    </div>
  </section>

  <section class="video-section">
    <div class="parallax-video parallax" style="background-image: url('<?php echo get_bloginfo('template_directory'); ?>/assets/img/home/parallax-video1.jpg');">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h5>The pearl of the indian ocean</h5>
            <h2>Sri Lanka</h2>
            <?php echo $video_des; ?>
          </div>
          <div class="col-md-6">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="<?php echo $video_link; ?>" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php get_footer(); ?>

<!-- Free Quotes Modal -->
<div class="modal fade" id="quoteModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Free Quotes</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <?php echo do_shortcode( '[contact-form-7 id="517" title="Free Quotes Form"]' ); ?>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function () {
    // Home Slider btn modal trigger
    $(".slho-motopress-btn").click(function () {
      $('#quoteModal').modal('show');
    });
  });
</script>