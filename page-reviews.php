<?php
/*
Template Name: Reviews
*/
?>

<?php get_header(); ?>

<?php
  $reviews_featured = get_field('reviews_featured');
?>

<section class="heading-section" style="background-image: url(<?php echo $reviews_featured; ?>);">
  <div class="vertical-align">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        <h2 class="page-heading">Reviews</h2>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="reviews-fancy" class="reviews-section">
  <div class="container">
    <div class="row">
      <?php
        $review_imgs = get_field('review_img');
      ?>
      <?php foreach( $review_imgs as $review_img ): ?>
        <div class="col-md-3 col-sm-6">
          <a href="<?php echo $review_img['url']; ?>" data-fancybox="reviews">
            <img class="img-fluid" src="<?php echo $review_img['sizes']['large']; ?>" alt="<?php echo $review_img['alt']; ?>" />
          </a>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="text-center">
      <a href="https://www.facebook.com/pg/nelumsrilankaholidays/reviews/" target="_blank" class="slho-btn bg-green">Facebook Reviews</a>
    </div>
  </div>
</section>

<?php get_footer(); ?>