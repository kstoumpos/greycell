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

function ProjectTheme_my_account_workspaces_function() {
		global $current_user, $wpdb, $wp_query;
		$current_user = wp_get_current_user();
		$uid = $current_user->ID;

    ?>
    <div class="account-main-area col-xs-12 col-sm-8 col-md-8 col-lg-8">
        <?php
            global $wp_query;
            $query_vars = $wp_query->query_vars;
            $post_per_page = 10;


            $args = array(
                'post_type'  => 'workspace',
                'meta_query' => array(
                    'relation' => 'OR',
                    array(
                        'key'     => 'freelancer',
                        'value'   => $uid,
                        'compare' => '=',
                    ),
                    array(
                        'key'     => 'customer',
                        'value'   => $uid,
                        'compare' => '=',
                    )

                )
            );

            query_posts($args);

            if(have_posts()) :
            while ( have_posts() ) : the_post();

                $project = get_post_meta(get_the_ID(),'project',true);
                $pst = get_post($project);

                $owner 		= get_userdata($pst->post_author);
                $projectTheme_get_winner_bid = projectTheme_get_winner_bid($project);
                $bidder 	= get_userdata($projectTheme_get_winner_bid->uid);

                //----------------------------------

            ?>
            <div class="post">
                <div class="padd10">
                    <div class="workspace_title_div">
                        <?php  printf(__(' Workspace for Project: <b>%s</b>','ProjectTheme'), $pst->post_title); ?> </div>
                        <div class="project_title_div">
                            <?php printf(__('Project ID: <b>%s</b>','ProjectTheme'), $pst->ID); ?> <br/>
                            <?php
                                $vvvv = projectTheme_get_unread_number_messages_workspaces_by_project($pst->ID, $uid);

                                if($vvvv > 0) {
                                    printf(__('Unread Messages:  %s','ProjectTheme'),  $vvvv); echo '<br/>';
                                }
                            ?>
                            <?php printf(__('Project owner: 
                            <img src="%s" alt="avatar-user" class="acc_m1" width="25" height="25" />
                            <a href="%s"> %s</a>','ProjectTheme'),
                            ProjectTheme_get_avatar($owner->ID,25, 25),
                            ProjectTheme_get_user_profile_link($owner->ID) ,$owner->user_login
                            ); 
                            ?>

                            <br/>
                            <?php printf(__('Project bidder: 
                            <img src="%s" alt="avatar-user" class="acc_m1" width="25" height="25" />
                            <a href="%s">%s</a>','ProjectTheme'), 
                            ProjectTheme_get_avatar($bidder->ID,25, 25),
                            ProjectTheme_get_user_profile_link($bidder->ID),  $bidder->user_login); ?> <br/>
                            <?php printf(__('Winning Bid Amount: %s','ProjectTheme'), projecttheme_get_show_price($projectTheme_get_winner_bid->bid)); ?> <br/>
                            <?php printf(__('Date work started: %s','ProjectTheme'), date_i18n('d-M-Y', get_post_meta($project,'closed_date',true) )); ?>

                        </div>
                        <a href="<?php echo get_the_permalink($project) ?>" class="go_back_btn" style="padding:5px 15px"><?php _e('To the project page','ProjectTheme') ?></a>
                        <a href="<?php echo home_url() ?>/?p_action=workspaces&pid=<?php the_ID() ?>" class="go_back_btn" style="padding:5px 15px"><?php _e('Read More or Send a Message','ProjectTheme') ?></a>
                        <?php 
                            $current_user=wp_get_current_user();
                            $mark_coder_delivered = get_post_meta($pst->ID,'mark_coder_delivered',true);
                            if(ProjectTheme_is_user_provider($current_user->ID) && $mark_coder_delivered == 0):?>
                                <a href="<?php echo home_url(); ?>/?p_action=mark_delivered&pid=<?php echo $pst->ID;?>" class="go_back_btn" style="padding:5px 15px">
                                    <?php echo __("Mark Delivered", "ProjectTheme");?>
                                </a>
                            <?php endif;?>
                            <?php 
                            $mark_coder_delivered = get_post_meta($pst->ID,'mark_coder_delivered',true);
                            $mark_seller_accepted = get_post_meta($pst->ID,'mark_seller_accepted',true);
                            if(ProjectTheme_is_user_business($current_user->ID) && $mark_coder_delivered == 1 && $mark_seller_accepted == 0): ?>
                                <a href="<?php echo home_url();?>/?p_action=mark_completed&pid=<?php echo $pst->ID;?>" class="go_back_btn" style="padding:5px 15px">
                                    <?php _e('Accept this project and', 'ProjectTheme');?>
                                </a>
                            <?php endif;?>
                    </div>
                </div>
                <?php
                    endwhile;

                    if(function_exists('wp_pagenavi')):
                    wp_pagenavi(); endif;

                        else:

                    echo '<div class="my_box3 border_bottom_0"> <div class="box_content">   ';
                    _e("There are no workspaces yet.",'ProjectTheme');
                    echo '</div>  </div> ';

                    endif;

                    wp_reset_query();
                ?>
    </div>
    
    <?php
    ProjectTheme_get_users_links();
}
?>