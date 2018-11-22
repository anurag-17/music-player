<?php



/**



 * The header for our theme



 *



 * This is the template that displays all of the <head> section and everything up until <div id="content">



 *



 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials



 *



 * @package WordPress



 * @subpackage Twenty_Seventeen



 * @since 1.0



 * @version 1.0



 */







?>



<!DOCTYPE html>



<html <?php language_attributes(); ?> class="no-js no-svg">



<head>



<meta charset="<?php bloginfo( 'charset' ); ?>">



<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="google-site-verification" content="YaLaWgSH7ICU-bVdKSRb5gWY1e4MrycvLiSNk7FPs2Y" />



<link rel="profile" href="http://gmpg.org/xfn/11">



<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">



<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">







<?php wp_head(); ?>



</head>

<?php
 header("Access-Control-Allow-Origin: *");?>





<body <?php body_class(); ?>>



<div id="page" class="site">



<a class="skip-link screen-reader-text" href="#content">



<?php _e( 'Skip to content', 'twentyseventeen' ); ?>



</a>

<div class="header-fix">

<header id="masthead" class="site-header" role="banner">



<div class="top-header">



    <div class="wrap">



      <div class="top-social">



        <ul>



          <li><a target="_blank" href="https://www.facebook.com/GFSindore/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>



          <li><a target="_blank" href="https://twitter.com/InfoGlobalfire"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>



          <li><a target="_blank" href="https://www.linkedin.com/in/globalfireservices/"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>



        </ul>



      </div>



      <div class="top-infotop">



        <ul>



          <li><span class="fa fa-phone"></span> <a href="tel:+91 9826033688">+91 9826033688</a></li>



          <li><span class="fa fa-envelope-o"></span> <a href="mailto:info.globalfireservices@gmail.com"> info.globalfireservices@gmail.com</a></li>



        </ul> 



      </div>



    </div>



  </div>



  



  



<div class="site-branding">



	<div class="wrap">



      <div class="logo">



		<?php the_custom_logo(); ?>



</div>



<div class="my-menu">







      <?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>



 



</div>



<div class="clear"></div>







	</div>



</div>







  



</header>

</div>

<!-- #masthead -->







<?php







	/*



	 * If a regular post or page, and not the front page, show the featured image.



	 * Using get_queried_object_id() here since the $post global may not be set before a call to the_post().



	 */



	if ( ( is_single() || ( is_page() && ! twentyseventeen_is_frontpage() ) ) && has_post_thumbnail( get_queried_object_id() ) ) :



		echo '<div class="single-featured-image-header">';



		echo get_the_post_thumbnail( get_queried_object_id(), 'twentyseventeen-featured-image' );



		echo '</div><!-- .single-featured-image-header -->';



	endif;



	?>



<div class="site-content-contain">



<div id="content" class="site-content">



