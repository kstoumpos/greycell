<?php
/*
Template Name: GreySell_HomePage
*/
?>

<?php
/***************************************************************************
*
*	ProjectTheme - copyright (c) - sitemile.com
*	The only project theme for wordpress on the world wide web.
*
*	Coder: Andrei Dragos Saioc
*	Email: sitemile[at]sitemile.com | andreisaioc[at]gmail.com
*	More info about the theme here: http://sitemile.com/products/wordpress-project-freelancer-theme/
*	since v1.2.5.3
*
***************************************************************************/
get_header();
global   $wp_query;

$gg = $wp_query->posts[0]->ID;
$post = get_post($gg);
 
?>
<?php projecttheme_search_box_thing() ?>

<!-- ########## -->

<div id="main_wrapper">
    <div id="slider_main" class="wrapper"> 
        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>			
        <?php endwhile; // end of the loop. ?>
    </div>
</div>
<?php get_footer(); ?>