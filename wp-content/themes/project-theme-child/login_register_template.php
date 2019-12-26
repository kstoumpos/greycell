<?php
/*
Template Name: Login_Register_Template
*/
?>

<?php

if (is_user_logged_in()) {
  $home = get_home_url();
  $location = $home . "/πώς-λειτουργεί/";
	wp_redirect( $location, $status = 302 );
}

get_header();
?>

<div class="#main_wrapper">

    <!-- ########## -->
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
    <!-- ################ -->

</div>

<?php get_footer(); ?>
