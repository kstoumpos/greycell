<?php
/*
Template Name: GreySell_Pages
*/
?>

<?php

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
