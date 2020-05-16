<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nelum_Holidays
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<link href="<?php echo get_bloginfo('template_directory'); ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Bad+Script|Open+Sans+Condensed:300,700|Open+Sans:300,400,700" rel="stylesheet">
  <link href="<?php echo get_bloginfo('template_directory'); ?>/assets/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo get_bloginfo('template_directory'); ?>/assets/css/jquery.fancybox.min.css" rel="stylesheet">
  <link href="<?php echo get_bloginfo('template_directory'); ?>/assets/packages/owl-carousel/dist/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?php echo get_bloginfo('template_directory'); ?>/assets/css/animate.css" rel="stylesheet" />
  <link href="<?php echo get_bloginfo('template_directory'); ?>/assets/css/sina-nav.css" rel="stylesheet">
  <link href="<?php echo get_bloginfo('template_directory'); ?>/style.css" rel="stylesheet" type="text/css" />

  <?php wp_head(); ?>
  
</head>

<?php
  $page_bg_color = get_field('page_bg_color');
?>

<body <?php body_class(); ?> style="background-color: <?php echo $page_bg_color; ?>">
<?php if ( get_field('preloader_img', 'option') ) : ?>
  <div class="preloader" style="background-image: url(<?php echo get_field('preloader_img', 'option'); ?>);"></div>
<?php endif; ?>
  <header>
    <?php
      $header_mobile = get_field('header_mobile', 'option');
      $header_email = get_field('header_email', 'option');
      $header_logo = get_field('header_logo', 'option');
    ?>
    <section class="top-bar">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <p class="topbar-phone">
              <span><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/img/whatsapp.svg" width="auto" height="18" alt="whatsapp logo"></span>
              <span><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/img/viber.svg" width="auto" height="20" alt="viber logo"></span>
              <i class="fa fa-phone" aria-hidden="true"></i>&nbsp;<a href="tel:<?php echo $header_mobile; ?>"><?php echo $header_mobile; ?></a>
            </p>
          </div>
          <div class="col-md-6">
            <p class="topbar-email">
              <i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;<a href="mailto:<?php echo $header_email; ?>"><?php echo $header_email; ?></a>
            </p>
          </div>
        </div>
      </div>
    </section>
    <nav class="sina-nav mobile-sidebar" data-top="0">
      <div class="container">
    
        <div class="sina-nav-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
            <i class="fa fa-bars"></i>
          </button>
          <a class="sina-brand" href="<?php bloginfo( 'url' ); ?>">
            <img src="<?php echo $header_logo['url']; ?>" width="auto" height="50" alt="<?php echo $header_logo['alt']; ?>">
          </a>
        </div>
    
        <div class="collapse navbar-collapse" id="navbar-menu">
          <?php
            $args = array(
                'menu' => 'main-menu',
                'container' => 'false',
                'menu_class'=>'sina-menu sina-menu-right'
            );
            wp_nav_menu($args);
          ?>
          </ul>
        </div>
    
      </div>
    </nav>
  </header>
