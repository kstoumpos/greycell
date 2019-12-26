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


function ProjectTheme_my_account_area_main_function(){
    global $current_user, $wp_query;
    $current_user=wp_get_current_user();
    $uid = $current_user->ID;
?>

<!-- Script to generate Tooltips -->
<script>
    jQuery(document).ready(function(){
        jQuery('[data-toggle="tooltip"]').tooltip();
    });
</script>

<div class="account-main-area col-xs-12 col-sm-8 col-md-8 col-lg-8">
    <?php
        if(isset($_GET['prj_not_approved'])) {
            $psts = get_post($_GET['prj_not_approved']);
            ?>
            <div class="saved_thing">
                <?php echo sprintf(__('Your payment was received for the item: <b>%s</b> but your project needs to be approved.
                    You will be notified when your project will be approved and live on our website','ProjectTheme'), $psts->post_title ); ?>
            </div>

            <?php
            }
            if(ProjectTheme_is_user_business($uid)):
                ?>

                <div class="box_title">
                    <?php _e("Draft Projects(Unpublished)", "ProjectTheme"); ?>
                    <i class="fas fa-info-circle fa-xs" data-toggle="tooltip" data-placement="auto" title="<?php _e("Projects in this category are under approval from administrators. ", "ProjectTheme"); ?>"></i>
                </div>

                <?php
                    global $wp_query;
                    $query_vars = $wp_query->query_vars;
                    $post_per_page = 5;

                    $args = array('post_type' => 'project', 'author' => $uid, 'order' => 'DESC', 'orderby' => 'date', 'posts_per_page' => $post_per_page,
                    'paged' => 1, 'post_status' => 'draft' );

                    query_posts($args);

                    if(have_posts()) :
                    while ( have_posts() ) : the_post();
                        projectTheme_get_post_acc();
                    endwhile;

                    else:

                    echo '<div class="my_box3"> <div class="box_content"> ';
                    _e("There are no projects yet.",'ProjectTheme');
                    echo '</div></div>';

                    endif;

                    wp_reset_query();
                ?>
                <div class="box_title">
                    <?php _e("Receiving bids", "ProjectTheme"); ?>
                    <i class="fas fa-info-circle fa-xs" data-toggle="tooltip" data-placement="auto" title="<?php _e("Projects are still open for bids.", "ProjectTheme"); ?>"></i>
                </div>

                <?php
                    global $wp_query;
                    $query_vars = $wp_query->query_vars;
                    $post_per_page = 5;


                    // $closed = array(
                    //     'key' => 'closed',
                    //     'value' => "0",
                    //     'compare' => '='
                    // );

                    // $paid = array(
                    //     'key' => 'paid',
                    //     'value' => "0",
                    //     'compare' => '='
                    // );

                    // $args = array('post_type' => 'project', 'author' => $uid, 'order' => 'DESC', 'orderby' => 'date', 'posts_per_page' => $post_per_page,
                    // 'paged' => 1, 'meta_query' => array($paid, $closed), 'post_status' =>'publish' );

                    // query_posts($args);

                    // same query as in active_projects.php file
                    query_posts( "meta_key=closed&meta_value=0&post_type=project&order=DESC&orderby=id&author=".$uid.
                    "&posts_per_page=".$post_per_page."&paged=".$query_vars['paged'] );

                    if(have_posts()) :
                    while ( have_posts() ) : the_post();
                        projectTheme_get_post_acc();
                    endwhile;

                    else:

                    echo'<div class="my_box3">
                            <div class="box_content"> ';
                                _e("There are no projects yet.",'ProjectTheme');
                    echo '</div></div>';

                    endif;

                    wp_reset_query();
                ?>
                <div class="clear10"></div>

                <div class="box_title">
                    <?php _e("Assigned Projects(Active)",'ProjectTheme'); ?>
                    <i class="fas fa-info-circle fa-xs" data-toggle="tooltip" data-placement="auto" title="<?php _e("Active Projects you have already assigned to a professional.", "ProjectTheme"); ?>"></i>
                </div>

                <?php
                global $current_user;
                $current_user = wp_get_current_user();
                $uid = $current_user->ID;


                global $wp_query;
                $query_vars = $wp_query->query_vars;
                $post_per_page = 10;

                $outstanding = array(
                        'key' => 'outstanding',
                        'value' => "1",
                        'compare' => '='
                    );

                $args = array('post_type' => 'project', 'author' => $uid, 'order' => 'DESC', 'orderby' => 'date', 'posts_per_page' => $post_per_page,
                'paged' => $query_vars['paged'], 'meta_query' => array($outstanding));

                query_posts( $args);

                if(have_posts()) :
                while ( have_posts() ) : the_post();
                    projectTheme_get_post_awaiting_compl();
                endwhile;

                if(function_exists('wp_pagenavi')):
                wp_pagenavi(); endif;

                    else:
                echo '<div class="my_box3 border_bottom_0"> <div class="box_content">   ';
                _e("There are no projects yet.",'ProjectTheme');
                echo '</div>  </div> ';
                endif;

                wp_reset_query();
                ?>

                <div class="box_title">
                    <?php _e("History",'ProjectTheme'); ?>
                    <i class="fas fa-info-circle fa-xs" data-toggle="tooltip" data-placement="auto" title="<?php _e("Completed or unfinished Projects", "ProjectTheme"); ?>"></i>
                </div>

                <?php
                    query_posts( "meta_key=paid_user&meta_value=1&post_type=project&order=DESC&orderby=id&author=".$uid."&posts_per_page=3" );

                    if(have_posts()) :
                        while ( have_posts() ) : the_post();
                            projectTheme_get_post_acc();
                        endwhile;
                    else:
                        echo '<div class="my_box3"><div class="box_content">';
                        _e("There are no projects yet.",'ProjectTheme');
                        echo '</div></div>';
                    endif;

                    wp_reset_query();
                ?>
            <?php endif; ?>

            <?php if(ProjectTheme_is_user_provider($uid)): ?>
                <div class="box_title">
                    <?php _e("Assigned Projects",'ProjectTheme'); ?>
                    <i class="fas fa-info-circle fa-xs" data-toggle="tooltip" data-placement="auto" title="<?php _e("Projects that have been assigned to you.", "ProjectTheme"); ?>"></i>
                </div>

                <?php

                    global $wp_query;
                    $query_vars = $wp_query->query_vars;
                    $post_per_page = 3;


                    $outstanding = array(
                        'key' => 'outstanding',
                        'value' => "1",
                        'compare' => '='
                    );

                    $winner = array(
                        'key' => 'winner',
                        'value' => $uid,
                        'compare' => '='
                    );

                    $args = array('post_type' => 'project', 'order' => 'DESC', 'orderby' => 'date', 'posts_per_page' => $post_per_page,
                    'paged' => 1, 'meta_query' => array($outstanding, $winner));


                    query_posts( $args  );

                    if(have_posts()) :
                    while ( have_posts() ) : the_post();
                        projectTheme_get_post_outstanding_project();
                    endwhile; else:

                    echo '<div class="my_box3"><div class="box_content">';
                    _e("There are no projects yet.",'ProjectTheme');
                    echo '</div></div>';


                    endif;
                    wp_reset_query();

                ?>

                <!-- <div class="box_title">
                    <?php _e("Completed & Awaiting Payment",'ProjectTheme'); ?>
                    <i class="fas fa-info-circle fa-xs" data-toggle="tooltip" data-placement="auto" title="<?php _e("Completed and Awaiting Payment-Tooltip", "ProjectTheme"); ?>"></i>
                </div>

                <?php
                    // $delivered = array(
                    //     'key' => 'delivered',
                    //     'value' => "1",
                    //     'compare' => '='
                    // );

                    // $paid = array(
                    //         'key' => 'paid_user',
                    //         'value' => "0",
                    //         'compare' => '='
                    //     );

                    // $winner = array(
                    //         'key' => 'winner',
                    //         'value' => $uid,
                    //         'compare' => '='
                    //     );

                    // $args = array('post_type' => 'project', 'order' => 'DESC', 'orderby' => 'date', 'posts_per_page' => $post_per_page,
                    // 'paged' => $query_vars['paged'], 'meta_query' => array($delivered, $paid, $winner));

                    // query_posts($args);

                    // if(have_posts()) :
                    //     while ( have_posts() ) : the_post();
                    //         projectTheme_get_post_awaiting_payment();
                    //     endwhile;

                    //     if(function_exists('wp_pagenavi')):
                    //     wp_pagenavi(); endif;

                    //     else:
                    //     echo '<div class="my_box3 border_bottom_0"> <div class="box_content">   ';
                    //     _e("You do not have any awaiting payments yet.",'ProjectTheme');
                    //     echo '</div>  </div> ';

                    // endif;
                ?> -->

                <div class="box_title">
                    <?php _e("My Proposals",'ProjectTheme'); ?>
                    <i class="fas fa-info-circle fa-xs" data-toggle="tooltip" data-placement="auto" title="<?php _e("Projects that I have sent my proposal.", "ProjectTheme"); ?>"></i>
                </div>

                <?php
                    query_posts( "meta_key=bid&meta_value=".$uid."&post_type=project&order=DESC&orderby=id&posts_per_page=10" );

                    if(have_posts()) :
                    while ( have_posts() ) : the_post();
                        projectTheme_get_post_my_proposal();
                    endwhile; else:

                    echo '<div class="my_box3"><div class="box_content">';
                    _e("There are no projects yet.",'ProjectTheme');
                    echo '</div></div>';

                    endif;
                    wp_reset_query();

                ?>

<div class="box_title">
                    <?php _e("History",'ProjectTheme'); ?>
                    <i class="fas fa-info-circle fa-xs" data-toggle="tooltip" data-placement="auto" title="<?php _e("Completed or unfinished Projects", "ProjectTheme"); ?>"></i>
                </div>

                <?php
                    //query_posts( "meta_key=paid_user&meta_value=1&post_type=project&order=DESC&orderby=id&posts_per_page=3" );
                    //query_posts( "meta_key=paid_user&meta_value=1&post_type=project" );

                    // We have two queries, one for the Losing Bids of the Provider and one for the Finished Projects. The message 'no projects yet' is shown
                    // if neither has any posts

                    // If there are Posts in either query this will be set to 0 and the message will not be shown. else it will
                    $no_projects_yet_message_flag = 1;

                    $post_per_page = 3;

                    // First Query(Loser Bids)

                    $bids = array(
                        'key' => 'bid',
                        'value' => $uid,
                        'compare' => '='
                    );

                    $loser = array(
                        'key' => 'winner',
                        'value' => $uid,
                        'compare' => '!='
                    );

                    $paid_user = array(
                        'key' => 'paid_user',
                        'value' => '1',
                        'compare' => '='
                    );

                    $args = array('post_type' => 'project', 'order' => 'DESC', 'orderby' => 'id', 'posts_per_page' => $post_per_page,
                    'paged' => 1, 'meta_query' => array($bids, $loser, $paid_user));

                    query_posts($args);


                    if(have_posts()) :
                        while ( have_posts() ) : the_post();
                            projectTheme_get_post_my_proposal();;
                        endwhile; 
                        $no_projects_yet_message_flag = 0;
                    endif;

                    wp_reset_query();

                    // Second Query(Finished Projects)

                    $winner = array(
                        'key' => 'winner',
                        'value' => $uid,
                        'compare' => '='
                    );

                    $paid_user = array(
                        'key' => 'paid_user',
                        'value' => '1',
                        'compare' => '='
                    );

                    $args = array('post_type' => 'project', 'order' => 'DESC', 'orderby' => 'id', 'posts_per_page' => $post_per_page,
                    'paged' => 1, 'meta_query' => array($winner, $paid_user));

                    query_posts($args);

                    if(have_posts()) :
                        while ( have_posts() ) : the_post();
                            projectTheme_get_post();
                        endwhile; 
                        $no_projects_yet_message_flag = 0;
                    endif;

                    wp_reset_query();
                
                    // If flag = 1 we show message
                    if($no_projects_yet_message_flag == 1) {
                        echo '<div class="my_box3"><div class="box_content">';
                        _e("There are no projects yet.",'ProjectTheme');
                        echo '</div></div>';  
                    }
                
                ?>

            <?php endif; ?>

</div>
<!-- end dif content -->

<?php
ProjectTheme_get_users_links();
}
?>
