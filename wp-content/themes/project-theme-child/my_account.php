<?php
/*
Template Name: GreySell_My_Account_Pages
*/
?>

<?php
if ( ! is_user_logged_in() ) {
  wp_redirect( ''. get_site_url() . '/σύνδεση/' );
  exit;
}

get_header();
global   $wp_query;

$gg = $wp_query->posts[0]->ID;
$post = get_post($gg);

?>

<?php projecttheme_search_box_thing() ?>

<!-- ########## -->

<div id="main_wrapper">
    <div id="main" class="wrapper">

        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
        <?php endwhile; // end of the loop. ?>


    </div>
</div>
<?php get_footer(); ?>
