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
                        <?php the_title(); ?> </div>
                        <div class="project_title_div">
                            <?php printf(__('Project: <b>%s</b>','ProjectTheme'), $pst->post_title); ?> <br/>
                            <?php
                                $vvvv = projectTheme_get_unread_number_messages_workspaces_by_project($pst->ID, $uid);

                                if($vvvv > 0) {
                                    printf(__('Unread Messages:  %s','ProjectTheme'),  $vvvv); echo '<br/>';
                                }
                            ?>
                            <?php printf(__('Project owner: <a href="%s">%s</a>','ProjectTheme'), ProjectTheme_get_user_profile_link($owner->ID) ,$owner->user_login); ?> <br/>
                            <?php printf(__('Project bidder: <a href="%s">%s</a>','ProjectTheme'), ProjectTheme_get_user_profile_link($bidder->ID),  $bidder->user_login); ?> <br/>
                            <?php printf(__('Winning Bid Amount: %s','ProjectTheme'), projecttheme_get_show_price($projectTheme_get_winner_bid->bid)); ?> <br/>
                            <?php printf(__('Date work started: %s','ProjectTheme'), date_i18n('d-M-Y', get_post_meta($project,'closed_date',true) )); ?>

                        </div>
                        <a href="<?php echo get_the_permalink($project) ?>" class="post_bid_btn"><?php _e('To the project page','ProjectTheme') ?></a>
                        <a href="<?php echo home_url() ?>/?p_action=workspaces&pid=<?php the_ID() ?>" class="post_bid_btn"><?php _e('Read More or Send a Message','ProjectTheme') ?></a>
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