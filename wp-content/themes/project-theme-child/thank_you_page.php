<?php
/*
Template Name: GreySell_Thanks_Pages
*/
?>

<?php

get_header();
global   $wp_query;

$gg = $wp_query->posts[0]->ID;
$post = get_post($gg);

$uid = $current_user->ID;

if(isset($_GET['act'])){
  if(isset($_GET['act'])){
        $data = unserialize(base64_decode($_GET['act']));
        $code = get_user_meta($uid, 'activation_code', true);
        // verify whether the code given is the same as ours
        if($code == $data['code']){
            // update the user meta
            update_user_meta($uid, 'account_activated', 1);
        }
        // echo "id:". $data['id'] ;
        // echo "<br>code:". $data['code'] ;
        // echo $code ;
    }
  }

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
