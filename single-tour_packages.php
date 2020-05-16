<?php
/**
 * The template for displaying single posts of tour packages
 *
 * @package Nelum_Holidays
 */

get_header();
?>

<?php
  $tour_featured_img = get_field('tour_featured_img');
  $tour_map = get_field('tour_map');
  $price_included = get_field('price_included');
  $fine_print_section = get_field('fine_print_section');
  $optional_details = get_field('optional_details');
?>

<section class="heading-section" style="background-image: url(<?php echo $tour_featured_img; ?>);">
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

<section class="single-tour-section">
  <div class="container">
    <h2 class="underline-center-heading">Tour Itinerary</h2>
    <div class="row">
      <div class="col-md-12">
        <div class="main-timeline">
        <?php if ( have_rows('tour_itinerary') ) : ?>
          <?php while( have_rows('tour_itinerary') ) : the_row(); ?>
            <?php
              $itinerary_day = get_sub_field('itinerary_day');
              $itinerary_heading = get_sub_field('itinerary_heading');
              $itinerary_img = get_sub_field('itinerary_img');
              $itinerary_des = get_sub_field('itinerary_des');
            ?>
          <div class="timeline">
            <span class="timeline-icon"></span>
            <span class="year"><?php echo $itinerary_day; ?></span>
            <div class="timeline-content">
              <h3 class="title"><?php echo $itinerary_heading; ?></h3>
              <img class="img-fluid" src="<?php echo $itinerary_img['url']; ?>" width="100%" height="auto" alt="<?php echo $itinerary_img['alt']; ?>">
              <p class="description">
                <?php echo $itinerary_des; ?>
              </p>
            </div>
          </div>
          <?php endwhile; ?>
        <?php endif; ?>
        </div>
      </div>
    </div>

    <div class="text-center book-tour">
      <a href="" data-toggle="modal" data-target="#tourModal" class="slho-btn bg-green">Price Request</a>
    </div>

  </div>
</section>

<section class="single-attractions-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
          <h2 class="underline-heading">Attractions</h2>
          <ul class="fa-ul">
          <?php if ( have_rows('tour_attractions') ) : ?>
            <?php while( have_rows('tour_attractions') ) : the_row(); ?>
              <?php
                $tour_attraction = get_sub_field('tour_attraction');
              ?>
              <li><i class="fa-li fa fa-heart"></i><?php echo $tour_attraction; ?></li>
            <?php endwhile; ?>
          <?php endif; ?>
          </ul>
      </div>
    </div>
  </div>
</section>

<?php if($tour_map): ?>
<section class="single-map-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="underline-heading">Tour Map</h2>
        <div class="maps">
          <?php echo $tour_map; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>


<?php if($price_included): ?>
<section class="price-included-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
          <h2 class="underline-heading">Price Included</h2>
          <ul class="fa-ul">
          <?php if ( have_rows('price_included') ) : ?>
            <?php while( have_rows('price_included') ) : the_row(); ?>
              <?php
                $price_include = get_sub_field('price_include');
              ?>
              <li><i class="fa-li fa fa-check-square-o"></i><?php echo $price_include; ?></li>
            <?php endwhile; ?>
          <?php endif; ?>
          </ul>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if($fine_print_section): ?>
<section class="fine-print-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
          <h2 class="underline-heading">Fine Print</h2>
          <ul class="fa-ul">
          <?php if ( have_rows('fine_print_section') ) : ?>
            <?php while( have_rows('fine_print_section') ) : the_row(); ?>
              <?php
                $fine_print = get_sub_field('fine_print');
              ?>
              <li><i class="fa-li fa fa-hand-o-right"></i><?php echo $fine_print; ?></li>
            <?php endwhile; ?>
          <?php endif; ?>
          </ul>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if($optional_details): ?>
<section class="optional-details">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php echo $optional_details; ?>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<?php get_footer(); ?>

<!-- Inquiry Form Modal -->
<div class="modal fade" id="tourModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Inquiry Form</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <?php echo do_shortcode( '[contact-form-7 id="431" title="Tour Booking Form"]' ); ?>
      </div>
    </div>
  </div>
</div>
