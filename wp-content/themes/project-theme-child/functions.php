<?php
include('custom-shortcodes.php');
include('email_notifications/notifications.php');
include('register_pro.php');
include('plans_panel.php');
/**
 * Child theme functions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
**/


/**
 * Load the parent style.css file
 *
 * @link http://codex.wordpress.org/Child_Themes
**/

?>

<?php
//Start: Change the wp-admin folder
add_filter('site_url', 'wpadmin_filter', 10, 3);
function wpadmin_filter( $url, $path, $orig_scheme ) {
    $old = array( "/(wp-admin)/");
    $admin_dir = WP_ADMIN_DIR;
    $new = array($admin_dir);
    return preg_replace( $old, $new, $url, 1);
}

add_action( 'init', 'block_wp_admin' );
function block_wp_admin() {
    if(strpos($_SERVER['REQUEST_URI'],'wp-admin') != false){
        wp_redirect( home_url().'/404' );
        exit;
    }
}
//End
function enqueue_dropzone_style(){
    //CSS
    wp_register_style('dropzone_css', get_stylesheet_directory_uri() . '/css/dropzone.css',array(),13);
    wp_enqueue_style('dropzone_css');

    //JS
    wp_register_script('dropzone_scripts', get_stylesheet_directory_uri() . '/js/dropzone.js', array('jquery'),'1.2', true);
    wp_enqueue_script('dropzone_scripts');
}
add_action('dropzone_style','enqueue_dropzone_style');

function total_child_enqueue_parent_theme_style() {
	// Dynamically get version number of the parent stylesheet
	$theme = wp_get_theme( 'ProjectTheme' );

    $parent_style = 'ptheme-style';
	// Load the Parent stylesheet
    wp_enqueue_style( $parent_style, get_template_directory_uri().'/style.css');
    //Load Child stylesheet
    wp_enqueue_style( 'child-style',
        get_stylesheet_uri(),
        array($parent_style),
        wp_get_theme()->get('Version')
    );
    wp_enqueue_style('ace-responsive-menu',get_stylesheet_directory_uri().'/css/ace-responsive-menu.css',array(),45);
}
add_action( 'wp_enqueue_scripts', 'total_child_enqueue_parent_theme_style' );

//Review Form enqueue style
function enqueue_feedback_form_style(){
    //CSS

    //Grey css
    wp_register_style('grey_css', get_stylesheet_directory_uri() . '/css/feedback_css/skins/square/grey.css');
    wp_enqueue_style('grey_css');
    //Animate css
    wp_register_style('animate_min_css', get_stylesheet_directory_uri() . '/css/feedback_css/animate.min.css');
    wp_enqueue_style('animate_min_css');
    //Responsive css
    wp_register_style('responsive_css', get_stylesheet_directory_uri() . '/css/feedback_css/responsive.css');
    wp_enqueue_style('responsive_css');
    //Custom css
    wp_register_style('custom_css', get_stylesheet_directory_uri() . '/css/feedback_css/custom.css',array(),11);
    wp_enqueue_style('custom_css');

    //JS

    //common scripts
    wp_register_script('common_scripts', get_stylesheet_directory_uri() . '/js/feedback_js/common_scripts.js', array('jquery'),'1.2', true);
    wp_enqueue_script('common_scripts');
    //progress bar and validation form
    wp_register_script('progress_bar_validation_form', get_stylesheet_directory_uri() . '/js/feedback_js/progress_bar_validation_form.js', array('jquery'),'1.5', true);
    wp_enqueue_script('progress_bar_validation_form');
    //Radio button
    wp_register_script('radio_button', get_stylesheet_directory_uri() . '/js/feedback_js/radio_button.js', array('jquery'),'1.2', true);
    wp_enqueue_script('radio_button');
}
add_action('feedback_style','enqueue_feedback_form_style');
//End

function ProjectTheme_get_location_clck($taxo, $selected = "", $ccc = "" , $xx = "") {
    $args = "orderby=name&order=ASC&hide_empty=0&parent=0";
    $terms = get_terms( $taxo, $args );

    $ret = '<select name="'.$taxo.'_cat" class="'.$ccc.'" id="location_select" '.$xx.' >';
    if(!empty($include_empty_option)) $ret .= "<option value=''>".$include_empty_option."</option>";

    if(empty($selected)) $selected = -1;

    foreach ( $terms as $term ) {
        $id = $term->term_id;
        //266 is the term id of location 'Απομακρυσμένα' (db table name: terms)
        $ret .= '<option '.(266 == $id ? "selected='selected'" : " " ).' value="'.$id.'">'.$term->name.'</option>';
    }
    $ret .= '</select>';

    return $ret;
}

function ProjectTheme_get_categories_clck($taxo, $selected = "", $include_empty_option = "", $ccc = "" , $xx = "") {
    $args = "orderby=name&order=ASC&hide_empty=0&parent=0";
    $terms = get_terms( $taxo, $args );

    $ret = '<select name="'.$taxo.'_cat" class="'.$ccc.'" id="'.$ccc.'" '.$xx.'>';
    if(!empty($include_empty_option)) $ret .= "<option value=''>".$include_empty_option."</option>";

    if(empty($selected)) $selected = -1;

    foreach ( $terms as $term ) {
        $id = $term->term_id;
        $ret .= '<option '.($selected == $id ? "selected='selected'" : " " ).' value="'.$id.'">'.$term->name.'</option>';
    }
    $ret .= '</select>';

    return $ret;
}

function ProjectTheme_get_total_nr_of_finished_projects_of_uid($uid) {

    $args1 = array('post_type' => 'project','paid_user' => '1',
    'meta_query' => array(
                        array(
                            'key' => 'winner',
                            'value' => $uid,
                            'compare' => '='
                        ),
                        array(
                            'key' => 'mark_seller_accepted',
                            'value' => 1,
                            'compare' => '='
                        )
                    )
    );

    $query2 = new WP_Query($args1);

	return $query2->found_posts;
}

function ProjectTheme_get_users_links() {
    global $current_user, $wpdb;
    $current_user = wp_get_current_user();
    $uid = $current_user->ID;

    $rd = projectTheme_get_unread_number_messages($current_user->ID); $rd1 = $rd;
    if($rd > 0) $ssk = "<span class='notif_a'>".$rd."</span>"; else $ssk = '';

    //-----------------------
    $rd = projectTheme_get_unread_number_messages_workspaces($current_user->ID);
    if($rd > 0) $ssk2 = "<span class='notif_a'>".$rd."</span>"; else $ssk2 = '';
    //-----------------------

    $query = "select id from ".$wpdb->prefix."project_ratings where fromuser='$uid' AND awarded='0'";
    $r = $wpdb->get_results($query);

    $ttl_fdbks = count($r);

    if($ttl_fdbks > 0)
        $ttl_fdbks2 = "<span class='notif_a'>".$ttl_fdbks."</span>";

    $ProjectTheme_enable_2_user_tp = get_option('ProjectTheme_enable_2_user_tp');
    $user_tp = get_user_meta($uid, 'user_tp', true);

    ?>

    <div  class="account-sidebar col-xs-12 col-sm-4 col-md-4 col-lg-4">
        <ul class="xoxo">
            <li class="ovfl widget-container widget_text account-sidebar-component">
                <div class=" col-xs-12 col-sm-12 col-md-12">
                    <div class="avatar-user2"><img width="135" height="135" border="0" src="<?php echo projecttheme_get_avatar($uid, 135, 135); ?>" id='single-project-avatar' /> </div>
                    <div class="avatar-user"><?php
                        $user_data = get_userdata($post->post_author);
                        echo '<a href="'.ProjectTheme_get_user_profile_link($current_user->ID).'" class="user-prof-lnk" style="font-size: 1.8rem;">'.$current_user->user_login.'</a>'; echo '<br/>';
                    ?>
                    </div>

                    <div class="avatar-user">
                        <div class="section-mid-1one">
                            <h6><?php _e('Registered on:','pricerrtheme'); ?></h6>
                                <span class=""><?php
                                    $registered = strtotime($current_user->user_registered);
                                    echo date_i18n("j F, Y", $registered);
                                ?></span>
                        </div>
                        <?php $home_url = get_home_url(); ?>
                        <div class="section-mid-1one">
                            <h6><?php printf(__('My Inbox (%s):','pricerrtheme'), $rd1); ?></h6>
                            <span class=""><a href="<?php echo $home_url . "/ο-λογαριασμός-μου/προσωπικά-μηνύματα/"; ?>" class="greenlink"><?php _e('Check All','pricerrtheme'); ?></a></span>
                        </div>
                    </div>
                    <!-- ##### -->
                    <div class="avatar-user">
                        <?php if(ProjectTheme_is_user_business($uid)):?>
                            <div class="section-mid-1one">
                                <?php printf(__('<h6>All open projects:</h6> %s','ProjectTheme'), '<span>' . ProjectTheme_get_total_nr_of_open_projects_of_uid($uid) .'</span>'); ?>
                            </div>
                        <?php else:?>
                            <div class="section-mid-1one">
                                <?php printf(__('<h6>Finished Projects:</h6> %s','ProjectTheme'), '<span>' . ProjectTheme_get_total_nr_of_finished_projects_of_uid($uid) .'</span>'); ?>
                            </div>
                        <?php endif;?>
                        <div class="section-mid-1one">
                            <?php printf(__('<h6>Projects in progress:</h6> %s','ProjectTheme'), '<span>'.ProjectTheme_get_total_nr_of_progress_projects_of_uid($uid).'</span>'); ?>
                        </div>
                        <?php
                            global $wpdb;
                            //Both rating should be approved, awarded and completed in order to fetch overall rating
                            $s = "select * from ".$wpdb->prefix."project_ratings where touser='$current_user->id' AND awarded='1' AND approved = '1' AND completed = '1'";
                            $r = $wpdb->get_results($s);

                            $s1 = "select * from ".$wpdb->prefix."project_ratings where fromuser='$current_user->id' AND awarded='1' AND approved = '1' AND completed = '1'";
                            $r1 = $wpdb->get_results($s1);
                            $i = 0; $s = 0;
                            $display_overall = 0;
                            if( count($r) > 0 && count($r1) > 0 ) {
                                foreach($r as $row)  {
                                    $i++;
                                    $s = $s + ($row->overall_grade);
                                }


                                $display_overall= floor($s/$i);
                                ?>
                                <div class="section-mid-1one">
                                    <h6><?php printf(__('<h6>Overall Rating:</h6> %s','ProjectTheme'), '<span>'.$display_overall.'/5</span>');?></h6>
                                </div>
                            <?php  } else { ?>
                                <div class="section-mid-1one">
                                    <h6><?php printf(__('<h6>Overall Rating:</h6> %s','ProjectTheme'), '<span>N/A</span>');?></h6>
                                </div>
                         <?php   } ?>
                        </div>

                        <?php

                        // Check if the User is Provider in order to show or not his Plan Details
                            if(ProjectTheme_is_user_provider($current_user->ID)) {
                                $planID = get_the_author_meta('planId', $current_user->ID);

                                global $wpdb;
                                $query = "select * from `greysell_plans`";
                                $results = $wpdb->get_results($query);
                                $numOfPlans = 0;

                                // get number of plans
                                foreach($results as $row) {
                                    $numOfPlans++;
                                }

                                // get plan name
                                foreach($results as $row) {
                                    if ($planID == $row->id) {
                                        $planName = $row->name;
                                        break;
                                    }
                                }

                                if($planID < 1 or $planID > $numOfPlans or empty($planID)) { ?>
                                    <div class = "avatar-user">
                                        <!-- <div class="section-mid-1one">
                                            <?php //_e('<h6>You have not chosen a Plan.</h6>','ProjectTheme'); ?>
                                        </div> -->

                                        <div class="section-mid-1one">
                                            <?php $myBids = get_the_author_meta( 'myBids', $current_user->id );
                                            // If $myBids is NULL then set it to 0
                                            if(empty($myBids))
                                                greysell_set_bids_to_zero($current_user->ID);
                                            ?>
                                            <h6> <?php _e('Bids:', 'ProjectTheme'); ?> </h6> <span><?php echo intval($myBids); ?></span>
                                        </div>

                                        <div class="section-mid-1one">
                                            <?php $sealedBids = get_the_author_meta( 'mySealedBids', $current_user->id );
                                            // If $sealedBids is NULL then set it to 0
                                            if(empty($sealedBids))
                                                greysell_set_sealed_bids_to_zero($current_user->ID);
                                            ?>
                                            <h6><?php _e('Sealed Bids:', 'ProjectTheme'); ?></h6> <span><?php echo intval($sealedBids); ?></span>
                                        </div>

                                        <div class="section-mid-1one">
                                            <a class = "change-plan-button-small" href="<?php echo home_url(); ?>/συνδρομές" id = "plans-button">
                                                <?php _e('Choose Plan', 'ProjectTheme');?>
                                            </a>
                                        </div>
                                    </div>
                                    <?php
                                } else { ?>
                                    <div class = "avatar-user">
                                        <!-- <div class="section-mid-1one">
                                            <?php //printf(__('<h6>Plan</h6> %s','ProjectTheme'), '<span>' . $planName .'</span>'); ?>
                                        </div> -->

                                        <div class="section-mid-1one">
                                            <?php $myBids = get_the_author_meta( 'myBids', $current_user->id );
                                            // If $myBids is NULL then set it to 0
                                            if(empty($myBids))
                                                greysell_set_bids_to_zero($current_user->ID);
                                            ?>
                                            <h6> <?php _e('Bids:', 'ProjectTheme'); ?> </h6> <span><?php echo intval($myBids); ?></span>
                                        </div>

                                        <div class="section-mid-1one">
                                            <?php $sealedBids = get_the_author_meta( 'mySealedBids', $current_user->id );
                                            // If $sealedBids is NULL then set it to 0
                                            if(empty($sealedBids))
                                                greysell_set_sealed_bids_to_zero($current_user->ID);
                                            ?>
                                            <h6><?php _e('Sealed Bids:', 'ProjectTheme'); ?></h6> <span><?php echo intval($sealedBids); ?></span>
                                        </div>

                                        <div class="section-mid-1one">
                                            <a class = "change-plan-button-small"  href="<?php echo home_url(); ?>/συνδρομές" id = "plans-button">
                                                <?php _e('Change Plan', 'ProjectTheme');?>
                                            </a>
                                        </div>
                                    </div>
                                    <?php
                                } ?>

                        <?php }

                        // Check if the User is Provider in order to show or not Button to 'Earn Bids' Page
                            if(ProjectTheme_is_user_provider($current_user->ID)) { ?>
                                    <div class = "avatar-user">
                                        <div class="section-mid-1one">
                                            <a class = "earn-bids-button-small"  href="<?php echo home_url(); ?>/κέρδισε-προσφορές">
                                                <?php _e('Earn Bids', 'ProjectTheme');?>
                                            </a>
                                        </div>
                                    </div>
                        <?php } ?>

                    </div>
                  </li>

            <!--Account-Menu-Widget-->

            <!-- ###### -->
            <?php
                if(ProjectTheme_is_user_business($uid)):

            ?>
            <li class="widget-container widget_text account-sidebar-component"><h3 class="widget-title"><?php _e("Service Contractor Menu",'ProjectTheme'); ?></h3>
                <p>
                    <?php
                        global $wpdb;
                        //------------------------------------------------
                    ?>
                    <ul id="my-account-admin-menu">
                      <?php $url = get_site_url(); ?>
                       <!-- <li><a href="<?php //echo projectTheme_post_new_link(); ?>" ><?php //_e("Post New Project",'ProjectTheme');?></a></li>-->
                        <li><a href="<?php echo get_site_url() . "/ο-λογαριασμός-μου/ανοιχτά-για-προσφορές/"; ?>"><?php _e("Receiving Bids",'ProjectTheme');?></a></li>
                        <li><a href="<?php echo get_site_url() . "/ο-λογαριασμός-μου/project-που-έχω-αναθέσει-ενεργά/"; ?>"><?php _e("Assigned Projects(Active)",'ProjectTheme');?></a></li>
                        <li><a href="<?php echo get_site_url() . "/ο-λογαριασμός-μου/project-προς-έγκριση/"; ?>"><?php printf(__("Draft Projects",'ProjectTheme'));?></a></li>
                        <li><a href="<?php echo get_site_url() . "/ο-λογαριασμός-μου/projects-που-έχεις-αναθέσει/"; ?>"><?php printf(__("Awaiting Completion",'ProjectTheme'));?></a></li>
                        <!-- <li><a href="<?php //echo get_permalink(get_option('ProjectTheme_my_account_outstanding_payments_id')); ?>"><?php //printf(__("Outstanding Payments",'ProjectTheme'));?></a></li> -->
                        <!-- <li><a href="<?php //echo get_permalink(get_option('ProjectTheme_my_account_completed_payments_id')); ?>"><?php //_e("Completed Payments",'ProjectTheme');?></a></li> -->

                        <?php do_action('ProjectTheme_my_account_service_contractor_menu'); ?>

                    </ul>
                </p>
            </li>

            <!-- ###### -->
            <?php
                endif;

                if(ProjectTheme_is_user_provider($uid)):

            ?>
            <li class="widget-container widget_text account-sidebar-component"><h3 class="widget-title"><?php _e("Freelancer Menu",'ProjectTheme'); ?></h3>
                <p>
                    <ul id="my-account-admin-menu">
                        <li><a href="<?php echo get_site_url() . "/ο-λογαριασμός-μου/ενεργά-projects-2/"; ?>"><?php printf(__("Outstanding Projects",'ProjectTheme')); ?></a></li>
                        <!-- <li><a href="<?php //echo get_permalink(get_option('ProjectTheme_my_account_awaiting_payments_id')); ?>"><?php //printf(__("Awaiting Payments",'ProjectTheme'), $awnr);?></a></li> -->
                        <li><a href="<?php echo get_site_url() . "/ο-λογαριασμός-μου/ολοκληρωμένα-projects/"; ?>"><?php _e("Delivered & Paid Projects",'ProjectTheme');?></a></li>
                        <li><a href="<?php echo get_site_url() . "/ο-λογαριασμός-μου/οι-προσφορές-μου/"; ?>"><?php _e("My Proposals",'ProjectTheme');?></a></li>

                        <?php do_action('ProjectTheme_my_account_service_provider_menu'); ?>
                    </ul>
                </p>
            </li>
            <?php endif; ?>
        </ul>
    </div>
    <?php //echo do_shortcode('[greysell_plans_panel_shortcode]'); ?>

<?php }?>

<?php
function ProjectTheme_do_login_register_init(){
    global $pagenow;

    if(isset($_GET['action']) && $_GET['action'] == "register" && !isset($_GET['_wpnonce'])) {
        if(is_user_logged_in()) {
            wp_redirect(get_permalink(get_option('ProjectTheme_my_account_page_id')));
        }
        echo do_shortcode("[reg_shortcode]");
    }

    switch ($pagenow) {

        case "wp-login.php":
            if(is_user_logged_in()) {
                wp_redirect(get_permalink(get_option('ProjectTheme_my_account_page_id')));
            }
            echo do_shortcode("[login_shortcode]");
            break;

        case "wp-register.php":
            if(is_user_logged_in()) { wp_redirect(get_permalink(get_option('ProjectTheme_my_account_page_id'))); }
                ProjectTheme_do_register_scr();
            break;
    }
}

function ProjectTheme_post_new_with_pid_stuff_thg($pid, $step = 1, $fin = 'no') {
	$using_perm = ProjectTheme_using_permalinks();
	if($using_perm)	return get_permalink(get_option('ProjectTheme_post_new_page_id')). "?post_new_step=".$step."&".($fin != "no" ? 'finalize=1&' : '' )."projectid=" . $pid;
	else return home_url(). "/?page_id=". get_option('ProjectTheme_post_new_page_id'). "&".($fin != "no" ? 'finalize=1&' : '' )."post_new_step=".$step."&projectid=" . $pid;
}

function projectTheme_get_post_acc() {
    $pid = get_the_ID();
	global $post, $current_user;
	$current_user = wp_get_current_user();
	$post = get_post($pid);
	$uid = $current_user->ID;


    $project_ending 	= get_post_meta(get_the_ID(), 'project_ending', true);
	$ending 			= get_post_meta(get_the_ID(), 'ending', true);
    $sec 				= $ending - current_time('timestamp',0);

    if(!empty($project_ending))
        $project_ending_period = $project_ending - current_time('timestamp',0);

	$location 			= get_post_meta(get_the_ID(), 'Location', true);
	$closed 			= get_post_meta(get_the_ID(), 'closed', true);
	$featured 			= get_post_meta(get_the_ID(), 'featured', true);
    $private_bids 		= get_post_meta(get_the_ID(), 'private_bids', true);
    $private_bids_paid  = get_post_meta(get_the_ID(), 'private_bids_paid', true);

    // If the user has not paid for the Private Bids feature , update the DB to not have private bids in this project
    if($private_bids_paid == '0' or $private_bids_paid == 0 or $private_bids_paid == false) {
        $private_bids = '0';
        update_post_meta($pid, 'private_bids', '0');
    }

	$paid		 		= get_post_meta(get_the_ID(), 'paid', true);

	$budget = ProjectTheme_get_budget_name_string_fromID(get_post_meta($pid,'budgets',true));
	$proposals = sprintf(__('%s proposals','ProjectTheme'), projectTheme_number_of_bid($pid));
	$proposals = sprintf(__('%s proposals','ProjectTheme'), projectTheme_number_of_bid($pid));

	$posted = get_the_time("jS F Y");
	$auth = get_userdata($post->post_author);
    $hide_project_p = get_post_meta($post->ID, 'private_bids', true);

    $days_left = ($closed == "0" ?  ($sec ) : __("Expired/Closed",'ProjectTheme'));
    if(!empty($project_ending))
        $project_pediod = ($closed == "0" ?  ($project_ending_period ) : __("Project Closed",'ProjectTheme'));
    //$tm_d = get_post_meta(get_the_ID(), 'expected_delivery', true);+

    $days_left = date_i18n('d-M-Y', $ending);
    $project_pediod = date_i18n('d-M-Y', $project_ending);

	//----------------------

    if($arr[0] == "winner") 	$pay_this_me = 1;
    if($arr[0] == "winner_not") $pay_this_me2 = 1;
    if($arr[0] == "unpaid") 	$unpaid = 1;


    $paid = get_post_meta(get_the_ID(), 'paid', true);

    if($days_left < 0) $days_left = __('Expired/Closed','ProjectTheme');
    ?>
    <div class="post" id="post-<?php the_ID(); ?>">
        <div class="padd10">
            <div class="post-title">
            <?php if($post->post_status == "draft") { ?>
                <?php the_title() ?>
            <?php } else {?>
                <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
            <?php } ?>
                <?php
                    if($featured == "1")
                    echo '<span class="featured_thing_project2">'.__('Featured Project','ProjectTheme').'</span>';

                    if($hide_project_p == "1" or $hide_project_p == "yes")
                    echo '<span class="private_thing_project2">'.__('Sealed Bidding','ProjectTheme').'</span>';
                ?>
            </div>
            <?php
                if($post->post_status == "draft")
                echo '<div class="info-box">'.__('This project might not have been approved yet.','ProjectTheme').'</div>';
            ?>
            <div class="post-main-details">
                <ul>
                    <li>
                        <p><i class="budget-icon-me" data-toggle="tooltip" data-placement="auto" title="<?php _e("Average Bid", "ProjectTheme");?>"></i></p>
                        <h4><?php echo sprintf(__('Average Bid: %s','ProjectTheme'), ProjectTheme_average_bid($pid)) ?></h4>
                    </li>

                    <li>
                        <p><i class="proposals-icon-me" data-toggle="tooltip" data-placement="auto" title="<?php _e("Number of Proposals", "ProjectTheme");?>"></i></p>
                        <h4><?php echo $proposals ?></h4>
                    </li>

                    <li>
                        <p><i class="calendar-icon-me" data-toggle="tooltip" data-placement="auto" title="<?php _e("Date Posted", "ProjectTheme");?>"></i></p>
                        <h4><?php echo $posted ?></h4>
                    </li>

                    <li>
                        <div class="cart">
                            <p><i class="clock-icon-me" data-toggle="tooltip" data-placement="auto" title="<?php _e("Bidding Period", "ProjectTheme");?>"></i></p>
                            <h4 class="<?php echo (is_numeric($days_left) and $days_left > 0) ? "expiration_project_p" : "" ?>"><?php echo $days_left ?>
                            </h4>
                        </div>
                    </li>
                    <?php if(!empty($project_ending)): ?>
                        <li class="last">
                            <div class="cart">
                                <p><i class="clock-icon-me" data-toggle="tooltip" data-placement="auto" title="<?php _e("The Project Ending On", "ProjectTheme");?>"></i></p>
                                <h4 class="<?php echo (is_numeric($project_pediod) and $project_pediod > 0) ? "expiration_project_p" : "" ?>"><?php echo $project_pediod ?>
                                </h4>
                            </div>
                        </li>
                    <?php endif; ?>

                </ul>
            </div> <!-- end post-main-details -->

            <div class="excerpt-thing">
                <div class="my-deliv_2">
                    <?php if($pay_this_me == 1): ?>
                        <a href="<?php echo ProjectTheme_get_pay4project_page_url(get_the_ID()); ?>"
                        class="post_bid_btn"><?php echo __("Pay This", "ProjectTheme");?></a>
                    <?php endif; ?>

                    <?php if( $post->post_status == "draft"): ?>
                        <!-- <a href="<?php //the_permalink(); ?>" class="green_btn3"><?php //echo __("Read More", "ProjectTheme");?></a> -->
                    <?php endif; ?>

                    <?php if( $unpaid == 1):
                        $finalised_posted = get_post_meta(get_the_ID(),'finalised_posted',true);
                        if($finalised_posted == "1") $finalised_posted = 3; else $finalised_posted = "1";

                        $finalised_posted = apply_filters('ProjectTheme_publish_prj_posted', $finalised_posted);
                    ?>
                        <a href="<?php echo ProjectTheme_post_new_with_pid_stuff_thg(get_the_ID(), $finalised_posted); ?>" class="green_btn3"><?php echo __("Publish", "ProjectTheme");?></a>
                    <?php endif; ?>

                    <?php if($post->post_status == "draft") { ?>
                        <a href="<?php echo esc_url( home_url() ) ?>/?p_action=edit_project&pid=<?php the_ID(); ?>" class="green_btn3"> <i class="far fa-edit"></i> <?php echo __("Edit Project", "ProjectTheme");?></a>
                    <?php } ?>

                    <?php if($post->post_author == $uid) { ?>
                        <?php if($post->post_status == "draft") { ?>
                            <!-- <a href="<?php //echo esc_url( home_url() ) ?>/?p_action=repost_project&pid=<?php //the_ID(); ?>" class="green_btn3"><?php //echo __("Repost Project", "ProjectTheme");?></a> -->
                        <?php }?>
                        <?php
                            $winner = get_post_meta(get_the_ID(),'winner', true);
                            if($post->post_status == "draft"):
                        ?>
                        <a href="<?php echo esc_url( home_url() ) ?>/?p_action=delete_project&pid=<?php the_ID(); ?>" class="green_btn3"> <i class="far fa-trash-alt"></i> <?php echo __("Delete", "ProjectTheme");?></a>
                    <?php endif; ?>

                <?php } ?>

                </div>
            </div> <!-- end excerpt-thing -->

            <div class="user-poster-thing">
                <div class="user-avatar-me">
                    <img src="<?php echo ProjectTheme_get_avatar($post->post_author,25, 25) ?>" alt="avatar-user" class="acc_m1" width="25" height="25" />
                </div>
                <?php
                    global $wpdb;
                    //Both rating should be approved, awarded and completed in order to fetch overall rating
                    $s = "select * from ".$wpdb->prefix."project_ratings where touser='$current_user->id' AND awarded='1' AND approved = '1' AND completed = '1'";
                    $r = $wpdb->get_results($s);

                    $s1 = "select * from ".$wpdb->prefix."project_ratings where fromuser='$current_user->id' AND awarded='1' AND approved = '1' AND completed = '1'";
                    $r1 = $wpdb->get_results($s1);
                ?>

                    <div class="user-avatar-me fun-time">
                        <div class="post-main-details">
                            <ul>
                                <li><a class="avatar-posted-by-username" href="<?php echo ProjectTheme_get_user_profile_link($post->post_author); ?>"><?php echo $auth->user_login ?></a></li>
                                <li><?php echo ProjectTheme_project_get_star_rating($post->post_author); ?></li>
                                <li class="last"><a href="<?php echo ProjectTheme_get_user_feedback_link($post->post_author); ?>"><?php _e('View User Feedback','ProjectTheme'); ?></a></li>
                            </ul>
                        </div>
                    </div>
            </div> <!-- end user-poster-thing -->
        </div>
    </div>
    <?php
}
function projectTheme_get_post_outstanding_project() {
    do_action('projectTheme_get_post_outstanding_project_function');
}
function projectTheme_get_post_outstanding_project_function() {
    $pid = get_the_ID();
    global $post, $current_user;
    $current_user = wp_get_current_user();

    $ending 			= get_post_meta(get_the_ID(), 'ending', true);
    $sec 				= $ending - current_time('timestamp',0);
    $location 			= get_post_meta(get_the_ID(), 'Location', true);
    $closed 			= get_post_meta(get_the_ID(), 'closed', true);
    $featured 			= get_post_meta(get_the_ID(), 'featured', true);
    $private_bids 		= get_post_meta(get_the_ID(), 'private_bids', true);
    $paid		 		= get_post_meta(get_the_ID(), 'paid', true);

    $budget = ProjectTheme_get_budget_name_string_fromID(get_post_meta($pid,'budgets',true));
    $proposals = sprintf(__('%s proposals','ProjectTheme'), projectTheme_number_of_bid($pid));
    $proposals = sprintf(__('%s proposals','ProjectTheme'), projectTheme_number_of_bid($pid));

    $posted = get_the_time("jS F Y");
    $auth = get_userdata($post->post_author);
    $hide_project_p = get_post_meta($post->ID, 'private_bids', true);



    $tm_d = get_post_meta(get_the_ID(), 'expected_delivery', true);
    $due_date = sprintf(__('Due Date: %s','ProjectTheme'), date_i18n('d-M-Y g:iA', $tm_d));

    //----------------------

                $my_bid = projectTheme_get_bid_by_uid($pid, $current_user->ID);
                $my_bid = projecttheme_get_show_price($my_bid->bid);

        $mark_coder_delivered 			= get_post_meta(get_the_ID(), 'mark_coder_delivered', true);

    ?>

        <div class="post" id="post-<?php the_ID(); ?>"><div class="padd10">
            <div class="post-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a>

            <?php

                if($featured == "1")
                echo '<span class="featured_thing_project2">'.__('Featured Project','ProjectTheme').'</span>';

                if($hide_project_p == "1" or $hide_project_p == "yes")
                echo '<span class="private_thing_project2">'.__('Sealed Bidding','ProjectTheme').'</span>';

                ?>

            </div>
            <div class="post-main-details">
                <ul>
                    <li>
                        <p><i class="fas fa-wallet fa-lg" data-toggle="tooltip" data-placement="auto" title="<?php _e("Budget Range", "ProjectTheme");?>"></i></p>
                        <h4><?php echo sprintf(__('My Bid: %s','ProjectTheme'), $my_bid) ?></h4>
                        </a>
                    </li>

                    <li>
                        <p><i class="fas fa-trophy fa-lg" data-toggle="tooltip" data-placement="auto" title="<?php _e("Project Proposals", "ProjectTheme");?>"></i></p>
                        <h4><?php echo $proposals ?></h4>
                    </li>

                    <li>
                        <p><i class="far fa-calendar-alt fa-lg" data-toggle="tooltip" data-placement="auto" title="<?php _e("Date Posted", "ProjectTheme");?>"></i></p>
                        <h4><?php echo $posted ?></h4>
                    </li>

                    <li class="last">
                        <p><i class="fas fa-clock fa-lg" data-toggle="tooltip" data-placement="auto" title="<?php _e("The Project Ending On", "ProjectTheme");?>"></i></p>
                        <h4><?php echo $due_date ?></h4>
                    </li>

                </ul>
            </div> <!-- end post-main-details -->

            <div class="excerpt-thing">
                <?php if ($mark_coder_delivered == 0):?>
                <div class="my-deliv_1"><?php _e('After finishing the work on the project, you can mark it as <em><strong>delivered</strong></em> through your <a href="'.get_site_url().'/my-account/workspaces"> workspace</a>.','ProjectTheme') ?></div>
                <?php endif;?>
                <div class="my-deliv_2">
                        <?php do_action('ProjectTheme_outstanding_proj_buttons'); ?>

                        <?php if($mark_coder_delivered != "1"):

                                $cannot_mark_delivered = 0;
                                $projectTheme_enable_paypal_ad = get_option('projectTheme_enable_paypal_ad');

                                    if($projectTheme_enable_paypal_ad == "yes")
                                    {
                                        $adaptive_done = get_post_meta(get_the_ID(),'adaptive_done',true);
                                        if(empty($adaptive_done)) $cannot_mark_delivered = 1;
                                    }

                                    if(!$cannot_mark_delivered)
                                    {
                        ?>




                            <?php

                                    } else { echo '<div class="cpts_n1">'; _e('The service contractor must deposit the money escrow through PayPal before the project starts.','ProjectTheme'); echo '</div>'; }

                            $projectTheme_enable_paypal_ad = get_option('projectTheme_enable_paypal_ad');
                            if($projectTheme_enable_paypal_ad == "yes")
                            {

                                    $adaptive_done = get_post_meta(get_the_ID(),'adaptive_done',true);

                                    if($adaptive_done == 'started')
                                    {
                                        echo '<br/>';
                                        echo '<div style="margin-top:20px;" class="ep_ep2">'.__('The project owner has put the money into escrow for you. Once you mark the project as delivered the owner will release the money. ','ProjectTheme') . '</div>';
                                    }
                            }

                            ?>


                    <?php else:

                            $dv = get_post_meta(get_the_ID(), 'mark_coder_delivered_date', true);
                            $dv = date_i18n('d-M-Y H:i:s',$dv);

                    ?>

                    <span class="zbk_zbk">
                    <?php printf(__("Awaiting buyer response.<br/>Marked as delivered on: %s","ProjectTheme"), $dv); ?>
                    </span>

                    <?php endif; ?>


                </div>
            </div> <!-- end excerpt-thing -->


            <div class="user-poster-thing">
                <div class="user-avatar-me">
                    <img src="<?php echo ProjectTheme_get_avatar($post->post_author,25, 25) ?>" alt="avatar-user" class="acc_m1" width="25" height="25" />
                </div>

                <div class="user-avatar-me fun-time">
                <div class="post-main-details">
                <ul>
                    <li><a class="avatar-posted-by-username" href="<?php echo ProjectTheme_get_user_profile_link($post->post_author); ?>"><?php echo $auth->user_login ?></a></li>
                    <li><?php echo ProjectTheme_project_get_star_rating($post->post_author); ?></li>
                    <li class="last"><a href="<?php echo ProjectTheme_get_user_feedback_link($post->post_author); ?>"><?php _e('View User Feedback','ProjectTheme'); ?></a></li>
                </ul>

                </div>
                </div>

            </div> <!-- end user-poster-thing -->

        </div></div>

        <?php

}

function projectTheme_get_post_awaiting_payment() {
    do_action('projectTheme_get_post_awaiting_payment_function');
}

function projectTheme_get_post_awaiting_payment_function(){

    $pid = get_the_ID();
    global $post, $current_user;
    $current_user = wp_get_current_user();

    $ending 			= get_post_meta(get_the_ID(), 'ending', true);
    $sec 				= $ending - current_time('timestamp',0);
    $location 			= get_post_meta(get_the_ID(), 'Location', true);
    $closed 			= get_post_meta(get_the_ID(), 'closed', true);
    $featured 			= get_post_meta(get_the_ID(), 'featured', true);
    $private_bids 		= get_post_meta(get_the_ID(), 'private_bids', true);
    $paid		 		= get_post_meta(get_the_ID(), 'paid', true);

    $budget = ProjectTheme_get_budget_name_string_fromID(get_post_meta($pid,'budgets',true));
    $proposals = sprintf(__('%s proposals','ProjectTheme'), projectTheme_number_of_bid($pid));

    $posted = get_the_time("jS M Y");
    $auth = get_userdata($post->post_author);
    $hide_project_p = get_post_meta($post->ID, 'private_bids', true);



    $tm_d = get_post_meta(get_the_ID(), 'expected_delivery', true);
    $due_date = sprintf(__('Delivery was On: %s','ProjectTheme'), date_i18n('d-M-Y g:iA', $tm_d));

    //----------------------

    $bid = projectTheme_get_winner_bid(get_the_ID());
    $my_bid = ProjectTheme_get_show_price($bid->bid);


    ?>

        <div class="post" id="post-<?php the_ID(); ?>"><div class="padd10">
            <div class="post-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a>

             <?php

                if($featured == "1")
                echo '<span class="featured_thing_project2">'.__('Featured Project','ProjectTheme').'</span>';

                if($hide_project_p == "1" or $hide_project_p == "yes")
                echo '<span class="private_thing_project2">'.__('Sealed Bidding','ProjectTheme').'</span>';

                ?>

            </div>
            <div class="post-main-details">
                <ul>
                    <li>
                        <a style="color:black" data-toggle="tooltip" title="Bid I Placed">
                            <p><img src="<?php echo esc_url( get_template_directory_uri() ) ?>/images/wallet_icon2.png" alt="project budget" width="16" height="16" /></p>
                            <h4><?php echo sprintf(__('My Bid: %s','ProjectTheme'), $my_bid) ?></h4>
                        </a>
                    </li>

                    <li>
                        <a style="color:black" data-toggle="tooltip" title="Project Proposals">
                            <p><img src="<?php echo esc_url( get_template_directory_uri() ) ?>/images/prop_icon.png" alt="project proposals" width="16" height="16" /></p>
                            <h4><?php echo $proposals ?></h4>
                        </a>
                    </li>

                    <li>
                        <a style="color:black" data-toggle="tooltip" title="Date Posted">
                            <p><img src="<?php echo esc_url( get_template_directory_uri() ) ?>/images/cal_icon.png" alt="project calendar" width="16" height="16" /></p>
                            <h4><?php echo $posted ?></h4>
                        </a>
                    </li>

                    <li class="last">
                        <a style="color:black" data-toggle="tooltip" title=" The Project Ending On">
                            <p><img src="<?php echo esc_url( get_template_directory_uri() ) ?>/images/clock_icon.png" alt="project clock" width="16" height="16" /></p>
                            <h4><?php echo $due_date ?></h4>
                        </a>
                    </li>

                </ul>
            </div> <!-- end post-main-details -->

            <div class="excerpt-thing">
                <div class="my-deliv_1"><?php _e('Waiting for the service contractor to submit payment.','ProjectTheme') ?></div>
                <div class="my-deliv_2"><?php do_action('ProjectTheme_awaiting_payments_under_posted_in', get_the_ID()); ?>
                </div>
            </div> <!-- end excerpt-thing -->


            <div class="user-poster-thing">
                <div class="user-avatar-me">
                    <img src="<?php echo ProjectTheme_get_avatar($post->post_author,25, 25) ?>" alt="avatar-user" class="acc_m1" width="25" height="25" />
                </div>

                <div class="user-avatar-me fun-time">
                <div class="post-main-details">
                <ul>
                    <li><a class="avatar-posted-by-username" href="<?php echo ProjectTheme_get_user_profile_link($post->post_author); ?>"><?php echo $auth->user_login ?></a></li>
                    <li><?php echo ProjectTheme_project_get_star_rating($post->post_author); ?></li>
                    <li class="last"><a href="<?php echo ProjectTheme_get_user_feedback_link($post->post_author); ?>"><?php _e('View User Feedback','ProjectTheme'); ?></a></li>
                </ul>

                </div>
                </div>

            </div> <!-- end user-poster-thing -->

        </div></div>

        <?php

}

function projectTheme_get_post_my_proposal ( $arr = '') {
    $pid = get_the_ID();
    global $post, $current_user;
    $current_user = wp_get_current_user();

    $project_ending 	= get_post_meta(get_the_ID(), 'project_ending', true);
    if(!empty($project_ending))
        $project_ending_period = $project_ending - current_time('timestamp',0);
    $ending 			= get_post_meta(get_the_ID(), 'ending', true);
    $sec 				= $ending - current_time('timestamp',0);
    $location 			= get_post_meta(get_the_ID(), 'Location', true);
    $closed 			= get_post_meta(get_the_ID(), 'closed', true);
    $featured 			= get_post_meta(get_the_ID(), 'featured', true);
    $private_bids 		= get_post_meta(get_the_ID(), 'private_bids', true);
    $paid		 		= get_post_meta(get_the_ID(), 'paid', true);

    $budget = ProjectTheme_get_budget_name_string_fromID(get_post_meta($pid,'budgets',true));
    $proposals = sprintf(__('%s proposals','ProjectTheme'), projectTheme_number_of_bid($pid));
    $proposals = sprintf(__('%s proposals','ProjectTheme'), projectTheme_number_of_bid($pid));
    $days_left = ($closed == "0" ?  ($ending - current_time('timestamp',0)) : __("Expired/Closed",'ProjectTheme'));
    $posted = get_the_time("jS F Y");
    $auth = get_userdata($post->post_author);
    $hide_project_p = get_post_meta($post->ID, 'private_bids', true);

    if(!empty($project_ending))
        $project_pediod = ($closed == "0" ?  ($project_ending_period ) : __("Project Closed",'ProjectTheme'));

    $days_left = date_i18n('d-M-Y',$ending);
    $project_pediod = date_i18n('d-M-Y',$project_ending);

    if($days_left < 0) $days_left = __('Expired/Closed','ProjectTheme');

    ?>

        <div class="post" id="post-<?php the_ID(); ?>"><div class="padd10">
            <div class="post-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a>

            <?php

                if($featured == "1")
                echo '<span class="featured_thing_project2">'.__('Featured Project','ProjectTheme').'</span>';

                if($hide_project_p == "1" or $hide_project_p == "yes")
                echo '<span class="private_thing_project2">'.__('Sealed Bidding','ProjectTheme').'</span>';

                ?>

            </div>

                <?php

                if($post->post_status == "draft")
                echo '<div class="info-box">'.__('This project might not have been approved yet.','ProjectTheme').'</div>';


            ?>

            <div class="post-main-details">
                <ul>
                    <li>
                        <p><i class="budget-icon-me" data-toggle="tooltip" data-placement="auto" title="<?php _e("Budget Range", "ProjectTheme");?>"></i></p>
                        <h4><?php echo $budget ?></h4>
                    </li>

                    <li>
                        <p><i class="proposals-icon-me" data-toggle="tooltip" data-placement="auto" title="<?php _e("Project Proposals", "ProjectTheme");?>"></i></p>
                        <h4><?php echo $proposals ?></h4>
                    </li>

                    <li>
                        <p><i class="calendar-icon-me" data-toggle="tooltip" data-placement="auto" title="<?php _e("Date Posted", "ProjectTheme");?>"></i></p>
                        <h4><?php echo $posted ?></h4>
                    </li>

                    <li>
                        <p><i class="clock-icon-me" data-toggle="tooltip" data-placement="auto" title="<?php _e("The Project Ending On", "ProjectTheme");?>"></i></p>
                        <h4 class="<?php echo (is_numeric($days_left) and $days_left > 0) ? "expiration_project_p" : "" ?>">
                            <?php echo $days_left ?>
                        </h4>
                    </li>

                    <?php if(!empty($project_ending)): ?>
                        <li class="last">
                            <p><i class="clock-icon-me" data-toggle="tooltip" data-placement="auto" title="<?php _e("Project Ending Date", "ProjectTheme");?>"></i></p>
                            <h4 class="<?php echo (is_numeric($project_pediod) and $project_pediod > 0) ? "expiration_project_p" : "" ?>"><?php echo $project_pediod ?></h4>
                        </li>
                    <?php endif; ?>

                </ul>
            </div> <!-- end post-main-details -->
            <?php

                $my_bid = projectTheme_get_bid_by_uid($pid, $current_user->ID);
                $my_bid = projecttheme_get_show_price($my_bid->bid);

            ?>
            <div class="excerpt-thing">
                <div class="my-bid-thing-me"><?php printf(__('My Bid Amount: %s','ProjectTheme'), $my_bid) ?></div>
                <?php  if($private_bids == 'no' or $private_bids == '0' or $private_bids == 0 or $current_user->ID == $post->post_author): ?>
                    <div class="my-bid-thing-average"><?php printf(__('Average Bid: %s','ProjectTheme'), ProjectTheme_average_bid($pid)) ?></div>
                <?php endif; ?>
            </div> <!-- end excerpt-thing -->


            <div class="user-poster-thing">
                <div class="user-avatar-me">
                    <img src="<?php echo ProjectTheme_get_avatar($post->post_author,25, 25) ?>" alt="avatar-user" class="acc_m1" width="25" height="25" />
                </div>

                <div class="user-avatar-me fun-time">
                <div class="post-main-details">
                <ul>
                    <li><a class="avatar-posted-by-username" href="<?php echo ProjectTheme_get_user_profile_link($post->post_author); ?>"><?php echo $auth->user_login ?></a></li>
                    <li><?php echo ProjectTheme_project_get_star_rating($post->post_author); ?></li>
                    <li class="last"><a href="<?php echo ProjectTheme_get_user_feedback_link($post->post_author); ?>"><?php _e('View User Feedback','ProjectTheme'); ?></a></li>
                </ul>

                </div>
                </div>

            </div> <!-- end user-poster-thing -->

        </div></div>

    <?php

}

function projectTheme_get_post($arr = '') {
    do_action('ProjectTheme_get_regular_post_project', $arr);
}

function projectTheme_get_post_main_function ( $arr = '') {
    $pid = get_the_ID();
    global $post;

    $ending 			= get_post_meta(get_the_ID(), 'ending', true);
    $project_ending 	= get_post_meta(get_the_ID(), 'project_ending', true);
    if(!empty($project_ending))
        $project_ending_period = $project_ending - current_time('timestamp',0);
    $sec 				= $ending - current_time('timestamp',0);
    $location 			= get_post_meta(get_the_ID(), 'Location', true);
    $closed 			= get_post_meta(get_the_ID(), 'closed', true);
    $featured 			= get_post_meta(get_the_ID(), 'featured', true);
    $private_bids 		= get_post_meta(get_the_ID(), 'private_bids', true);
    $paid		 		= get_post_meta(get_the_ID(), 'paid', true);
    $views              = get_post_meta(get_the_ID(), 'views', true);

    $budget = ProjectTheme_get_budget_name_string_fromID(get_post_meta($pid,'budgets',true));
    $proposals = sprintf(__('%s proposals','ProjectTheme'), projectTheme_number_of_bid($pid));
    $proposals = sprintf(__('%s proposals','ProjectTheme'), projectTheme_number_of_bid($pid));
    $days_left = ($closed == "0" ?  ($ending - current_time('timestamp',0)) : __("Expired/Closed",'ProjectTheme'));
    $posted = get_the_time("jS F Y");
    $auth = get_userdata($post->post_author);
    $hide_project_p = get_post_meta($post->ID, 'private_bids', true);

    if($days_left < 0) $days_left = __('Expired/Closed','ProjectTheme');
    if(!empty($project_ending))
        $project_pediod = ($closed == "0" ?  ($project_ending_period ) : __("Project Closed",'ProjectTheme'));

    $days_left = date_i18n('d-M-Y',$ending);
    $project_pediod = date_i18n('d-M-Y',$project_ending);


    ?>
        <!-- Script to generate Tooltips -->
        <script>
            jQuery(document).ready(function() {
                jQuery('[data-toggle="tooltip"]').tooltip();
            });
        </script>
        <div class="post" id="post-<?php the_ID(); ?>">
            <div class="padd10">
                <div class="post-title">
                    <a href="<?php the_permalink() ?>"><?php the_title() ?></a>

                    <?php
                        if($featured == "1")
                        echo '<span class="featured_thing_project2">'.__('Featured Project','ProjectTheme').'</span>';

                        if($hide_project_p == "1" or $hide_project_p == "yes")
                        echo '<span class="private_thing_project2">'.__('Sealed Bidding','ProjectTheme').'</span>';

                        ?>

                </div>

                        <?php

                        if($post->post_status == "draft")
                        echo '<div class="info-box">'.__('This project might not have been approved yet.','ProjectTheme').'</div>';


                    ?>
                    <div class="post-main-details">

                        <ul>
                            <li>
                                <p><i class="budget-icon-me" data-toggle="tooltip" data-placement="auto" title="<?php _e("Budget Range", "ProjectTheme");?>"></i></p>
                                <h4><?php echo $budget ?></h4>
                            </li>

                            <li>
                                <p><i class="proposals-icon-me" data-toggle="tooltip" data-placement="auto" title="<?php _e("Project Proposals", "ProjectTheme");?>"></i></p>
                                <h4><?php echo $proposals ?></h4>
                            </li>

                            <li>
                                <p><i class="calendar-icon-me" data-toggle="tooltip" data-placement="auto" title="<?php _e("Date Posted", "ProjectTheme");?>"></i></p>
                                <h4><?php echo $posted ?></h4>
                            </li>

                            <li>
                                <div class="cart">
                                    <p><i class="clock-icon-me" data-toggle="tooltip" data-placement="auto" title="<?php _e("Bidding Period", "ProjectTheme");?>"></i></p>
                                    <h4 class="<?php echo (is_numeric($days_left) and $days_left > 0) ? "expiration_project_p" : "" ?>"><?php echo $days_left ?></h4>
                                </div>
                            </li>
                            <?php if(!empty($project_ending)): ?>
                                <li>
                                    <div class="cart">
                                        <p><i class="clock-icon-me" data-toggle="tooltip" data-placement="auto" title="<?php _e("The Project Ending On", "ProjectTheme");?>"></i></p>
                                        <h4 class="<?php echo (is_numeric($project_pediod) and $project_pediod > 0) ? "expiration_project_p" : "" ?>"><?php echo $project_pediod ?></h4>
                                    </div>
                                </li>
                            <?php endif; ?>

                            <li class="last">
                                <p><i class="fas fa-eye fa-lg" data-toggle="tooltip" data-placement="auto" title="<?php _e("Views", "ProjectTheme");?>" style="color:darkgreen;vertical-align:-50%;"></i></p>
                                <h4><?php echo $views; ?></h4>
                            </li>

                        </ul>
                    </div> <!-- end post-main-details -->

                    <div class="excerpt-thing">
                        <?php

                        if(has_excerpt(get_the_ID())) {
                            $tg = strip_tags(get_the_excerpt()); echo substr($tg, 0, -10);
                        } else {
                            $tg = 	strip_tags(get_the_content());
                            echo substr($tg, 0, 250);
                        }

                        ?>
                    </div> <!-- end excerpt-thing -->

                    <div class="user-poster-thing">
                        <div class="user-avatar-me">
                            <img src="<?php echo ProjectTheme_get_avatar($post->post_author,25, 25) ?>" alt="avatar-user" class="acc_m1" width="25" height="25" />
                        </div>

                        <div class="user-avatar-me fun-time">
                            <div class="post-main-details">
                                <ul>
                                    <li><a class="avatar-posted-by-username" href="<?php echo ProjectTheme_get_user_profile_link($post->post_author); ?>"><?php echo $auth->first_name." ".$auth->last_name ?></a></li>
                                    <li><?php echo ProjectTheme_project_get_star_rating($post->post_author); ?></li>
                                    <li class="last"><a href="<?php echo ProjectTheme_get_user_feedback_link($post->post_author); ?>"><?php _e('View User Feedback','ProjectTheme'); ?></a></li>
                                </ul>

                            </div>
                        </div>

                    </div> <!-- end user-poster-thing -->
            </div>
        </div>

    <?php

}
function projectTheme_get_post_awaiting_compl() {
    do_action('projectTheme_get_post_awaiting_compl_function');
}
function projectTheme_get_post_awaiting_compl_function() {
    $ending 			= get_post_meta(get_the_ID(), 'ending', true);
    $sec 				= $ending - current_time('timestamp',0);
    $location 			= get_post_meta(get_the_ID(), 'Location', true);
    $closed 			= get_post_meta(get_the_ID(), 'closed', true);
    $featured 			= get_post_meta(get_the_ID(), 'featured', true);
    $hide_project_p 			= get_post_meta(get_the_ID(), 'private_bids', true);

    $mark_coder_delivered 			= get_post_meta(get_the_ID(), 'mark_coder_delivered', true);
    $posted 						= get_the_time("jS M Y");
    $post							= get_post(get_the_ID());


    global $current_user;
    $current_user = wp_get_current_user();
    $uid = $current_user->ID;



    $bid = projectTheme_get_winner_bid(get_the_ID());
    $bid_wn = ProjectTheme_get_show_price($bid->bid);

    $winner = get_post_meta(get_the_ID(), 'winner', true);
    $winner = get_userdata($winner);
    $winner = '<a href="'.ProjectTheme_get_user_profile_link($winner->ID).'">'.$winner->user_login.'</a>';
    $winner = sprintf(__("Winner: %s", 'ProjectTheme'), $winner );

    $tm_d = get_post_meta(get_the_ID(), 'expected_delivery', true);
    $delivery_on = sprintf(__('Delivery On: %s','ProjectTheme'), date_i18n('d-M-Y g:iA', $tm_d));
    $auth = get_userdata($post->post_author);

    ?>

    <div class="post" id="post-<?php the_ID(); ?>"><div class="padd10">
        <div class="post-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a>

            <?php
                if($featured == "1")
                echo '<span class="featured_thing_project2">'.__('Featured Project','ProjectTheme').'</span>';

                if($hide_project_p == "1" or $hide_project_p == "yes")
                echo '<span class="private_thing_project2">'.__('Sealed Bidding','ProjectTheme').'</span>';
            ?>
            </div>
            <div class="post-main-details">
                <ul>
                    <li>
                        <p><i class="fas fa-wallet fa-lg" data-toggle="tooltip" data-placement="auto" title="<?php _e("Bid I placed", "ProjectTheme");?>"></i></p>
                        <h4><?php echo sprintf(__('Winning Bid: %s','ProjectTheme'), $bid_wn) ?></h4>
                    </li>

                    <li>
                        <p><i class="fas fa-trophy fa-lg" data-toggle="tooltip" data-placement="auto" title="<?php _e("Project Proposals", "ProjectTheme");?>"></i></p>
                        <h4><?php echo $winner ?></h4>
                    </li>

                    <li>
                        <p><i class="far fa-calendar-alt fa-lg" data-toggle="tooltip" data-placement="auto" title="<?php _e("Date Posted", "ProjectTheme");?>"></i></p>
                        <h4><?php echo $posted ?></h4>
                    </li>

                    <li class="last">
                        <p><i class="far fa-clock fa-lg" data-toggle="tooltip" data-placement="auto" title="<?php _e("The Project Ending On", "ProjectTheme");?>"></i></p>
                        <h4><?php echo $delivery_on ?></h4>
                    </li>

                </ul>
            </div> <!-- end post-main-details -->

            <div class="excerpt-thing">
                <?php if($mark_coder_delivered != "1"): ?>
                    <?php _e('The winner must mark this as delivered.','ProjectTheme'); ?> <br/>
                    <?php
                        $projectTheme_enable_paypal_ad = get_option('projectTheme_enable_paypal_ad');
                        if($projectTheme_enable_paypal_ad == "yes")
                        {

                                $adaptive_done = get_post_meta(get_the_ID(),'adaptive_done',true);
                                if(empty($adaptive_done))
                                {

                            ?>
                            <div class="mar20">
                                <a href="<?php echo esc_url( home_url() ); ?>/?p_action=pay_for_project_paypal&pid=<?php echo get_the_ID(); ?>" class="green_btn"><?php _e('Deposit PayPal Escrow','ProjectTheme') ?></a>
                            </div>
                            <?php
                                }
                                elseif($adaptive_done == 'started')
                                {
                                    echo '<br/>';
                                    echo _e('You have deposited escrow by PayPal for this project. Once the freelancer delivers the project, and you accept it, you will release the funds to freelancer. ','ProjectTheme');
                                }
                        } else {
                            if(!projecttheme_escrow_was_made_for_project_done(get_the_ID())):
                            $ProjectTheme_enable_credits_wallet = get_option('ProjectTheme_enable_credits_wallet');
                            if($ProjectTheme_enable_credits_wallet != 'no'):
                        ?>
                        <br/>
                        <!-- <a class="go_back_btn" href="<?php //echo ProjectTheme_get_payments_page_url_redir('escrow', '&poid=' . get_the_ID()) ?>" class="post_bid_btn"><?php //_e('Make Escrow','ProjectTheme') ?></a> -->

                        <?php endif; else: echo '<br/>'; _e('Escrow was made for this project.','ProjectTheme'); endif; }

                     else:

                           $dv = get_post_meta(get_the_ID(), 'mark_coder_delivered_date', true);
                           $dv = date_i18n('d-M-Y H:i:s',$dv);

                   ?>

                    <span class="zbk_zbk">
                        <?php printf(__("Marked as delivered on: %s","ProjectTheme"), $dv); ?>
                        <br/><br/>
                        <?php _e('View the progress of the project in its <a href=/my-account/workspace/> workspace</a>.','ProjectTheme'); ?>

                    </span>

                   <?php endif; ?>


            </div> <!-- end excerpt-thing -->


            <div class="user-poster-thing">
                <div class="user-avatar-me">
                    <img src="<?php echo ProjectTheme_get_avatar($post->post_author,25, 25) ?>" alt="avatar-user" class="acc_m1" width="25" height="25" />
                </div>

                <div class="user-avatar-me fun-time">
                <div class="post-main-details">
                <ul>
                    <li><a class="avatar-posted-by-username" href="<?php echo ProjectTheme_get_user_profile_link($post->post_author); ?>"><?php echo $auth->user_login ?></a></li>
                    <li><?php echo ProjectTheme_project_get_star_rating($post->post_author); ?></li>

                    <?php do_action('ProjectTheme_awaiting_completion_info_details') ?>

                    <li class="last"><a href="<?php echo ProjectTheme_get_user_feedback_link($post->post_author); ?>"><?php _e('View User Feedback','ProjectTheme'); ?></a></li>
                </ul>

                </div>
                </div>

            </div> <!-- end user-poster-thing -->

        </div>
    </div>
    <?php
}

function ProjectTheme_project_get_star_rating2($uid) {

	global $wpdb;
	$s = "select * from ".$wpdb->prefix."project_ratings where touser='$uid' AND awarded='1' AND approved = '1'";
	$r = $wpdb->get_results($s);
	$i = 0; $s = 0;

	if(count($r) == 0)	return __('(No rating)','ProjectTheme');
	else
	foreach($r as $row) // = mysql_fetch_object($r))
	{
		$i++;
		$s = $s + ($row->consistency_grade+$row->communication_grade);

	}

	$rating = round(($s/$i)/2, 0);
	$rating2 = round(($s/$i)/2, 1);


	return ProjectTheme_get_project_stars($rating)."<br/>(".$rating2 ."/5) ". sprintf(__("on %s rating(s)","ProjectTheme"), $i);
}

function ProjectTheme_project_get_star_rating($uid) {

	global $wpdb;
	$s = "select * from ".$wpdb->prefix."project_ratings where touser='$uid' AND awarded='1' AND approved = '1'";
    $r = $wpdb->get_results($s);
	$i = 0; $s = 0;

	if(count($r) == 0)	return __('(No rating)','ProjectTheme');
	else
	foreach($r as $row) // = mysql_fetch_object($r))
	{
		$i++;
		$s = $s + ($row->consistency_grade+$row->communication_grade);

	}

	$rating = round(($s/$i)/2, 0);
	$rating2 = floor(round(($s/$i)/2, 1));


	return ProjectTheme_get_project_stars($rating)." (".$rating2 ."/5) ". sprintf(__("on %s rating(s)","ProjectTheme"), $i);
}


function ProjectTheme_get_my_awarded_projects($uid) {
    $c = "<select name='projectss' onchange='on_proj_sel();' id='do_input_new' class='do_input_new'><option value='0'>".__('Select','ProjectTheme')."</option>";
    global $wpdb;

    $querystr = "
                    SELECT distinct wposts.*
                    FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta
                    WHERE wposts.post_author='$uid'
                    AND  wposts.ID = wpostmeta.post_id
                    AND wpostmeta.meta_key = 'closed'
                    AND wpostmeta.meta_value = '0'
                    AND wposts.post_status = 'publish'
                    AND wposts.post_type = 'project'
                    ORDER BY wposts.post_date DESC";

    //echo $querystr;
    $r = $wpdb->get_results($querystr);

    foreach($r as $row)
    {
        $pid = $row->ID;
        $winner = get_post_meta($pid, "winner", true);


        if(!empty($winner))
        {
            $c .= '<option value="'.$row->ID.'" '.($row->ID == $_GET['poid'] ? 'selected="selected"' : '').'>'.$row->post_title.'</option>';
            $i = 1;
        }
    }

    //----------------------------

    $querystr = "
    SELECT distinct wposts.*
    FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta
    WHERE wposts.ID = wpostmeta.post_id
    AND wpostmeta.meta_key = 'winner'
    AND wpostmeta.meta_value = '$uid'
    AND wposts.post_status = 'publish'
    AND wposts.post_type = 'project'
    ORDER BY wposts.post_date DESC ";



    $r = $wpdb->get_results($querystr);

    foreach($r as $row)  {
        $pid = $row->ID;

        $c .= '<option value="'.$row->ID.'">'.$row->post_title.'</option>';
        $i = 1;

    }

    //-------------------------------

    if($i == 1)
    return $c.'</select>';

    return false;
}



//GeoKits28/12/2018
function give_profile_name(){
	$user=wp_get_current_user();
	$name=$user->user_login;
	return $name;
}

add_shortcode('profile_name', 'give_profile_name');

add_filter( 'wp_nav_menu_objects', 'my_dynamic_menu_items' );
function my_dynamic_menu_items( $menu_items ) {
    $current_user = wp_get_current_user();
    $uid = $current_user->ID;

	foreach ( $menu_items as $menu_item ) {
		if ( '#profile_name#' == $menu_item->title ) {
			global $shortcode_tags;
			if ( isset( $shortcode_tags['profile_name'] ) ) {
                // Or do_shortcode(), if you must.
                $menu_item->title = '<img class = "user-avatar-menu" src = "'.ProjectTheme_get_avatar($uid,25, 25).'"/>';
			}
		}
	}
return $menu_items;
}

function my_retrieve_password() {

	global   $wpdb, $current_site;

	$errors = new WP_Error();

	if ( empty( $_POST['user_login'] ) ) {
		$errors->add('empty_username', __('<strong>ERROR</strong>: Enter a username or e-mail address.', 'ProjectTheme'));
	} else if ( strpos( $_POST['user_login'], '@' ) ) {
		$user_data = get_user_by( 'email', trim( $_POST['user_login'] ) );
		if ( empty( $user_data ) )
			$errors->add('invalid_email', __('<strong>ERROR</strong>: There is no user registered with that email address.', 'ProjectTheme'));
	} else {
		$login = trim($_POST['user_login']);
		$user_data = get_user_by('login', $login);
	}


	do_action('lostpassword_post');

	if ( $errors->get_error_code() )
		return $errors;

	if ( !$user_data ) {
		$errors->add('invalidcombo', __('<strong>ERROR</strong>: Invalid username or e-mail.', 'ProjectTheme'));
		return $errors;
	}

	// redefining user_login ensures we return the right case in the email
    $user_login = $user_data->user_login;
    $user_email = $user_data->user_email;

	do_action('retreive_password', $user_login);  // Misspelled and deprecated
	do_action('retrieve_password', $user_login);

	$allow = apply_filters('allow_password_reset', true, $user_data->ID);

	if ( ! $allow )
		return new WP_Error('no_password_reset', __('Password reset is not allowed for this user', 'ProjectTheme'));
	else if ( is_wp_error($allow) )
		return $allow;

	$key = $wpdb->get_var($wpdb->prepare("SELECT user_activation_key FROM $wpdb->users WHERE user_login = %s", $user_login));
	if ( empty($key) ) {
		// Generate something random for a key...
		$key = wp_generate_password(20, false);
		do_action('retrieve_password_key', $user_login, $key);
		// Now insert the new md5 key into the db
		$wpdb->update($wpdb->users, array('user_activation_key' => $key), array('user_login' => $user_login));
    }
    if ( is_multisite() ) {
		$blogname = $GLOBALS['current_site']->site_name;
    } else {
		// The blogname option is escaped with esc_html on the way into the database in sanitize_option
		// we want to reverse this for the plain text arena of emails.
        $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);
    }

    ProjectTheme_send_mail_on_reset_password($user_login,$user_email,$key);
}

function ProjectTheme_run_when_post_published($post) {
    if(is_array($post)) {
		if($post['post_type'] == 'project'):
            ProjectTheme_send_email_subscription($post['ID']);
            ProjectTheme_send_email_posted_project_approved($post['ID']);
            ProjectTheme_send_email_posted_project_approved_admin($post['ID']);
		endif;
	}

	if(is_object($post)) {
		if($post->post_type == 'project'):
            ProjectTheme_send_email_subscription($post->ID);
            ProjectTheme_send_email_posted_project_approved($post->ID);
            ProjectTheme_send_email_posted_project_approved_admin($post->ID);
		endif;
	}
}

/* Function that creates Directory for a User after his registration */
function greysell_create_user_dir($user_id) {
    $user_info = get_userdata( $user_id );

    $upload_dir = wp_upload_dir();
    $user_dir = $upload_dir['basedir'] . '/User_Directories/' . $user_info->ID;

    wp_mkdir_p($user_dir);
}
add_action( 'user_register', 'greysell_create_user_dir');

/* Change Upload Directory to the User's Directory. Filter is removed below */
function greysell_upload_dir( $param ) {
    $current_user = wp_get_current_user();
    $user_info = get_userdata( $current_user->ID );

    $newUploadDir = '/User_Directories/' . $user_info->ID;

    $param['path'] = $param['basedir'] . $newUploadDir;
    $param['url']  = $param['baseurl'] . $newUploadDir;

    return $param;
}

/* Function Override from Parent ProjectTheme */
function projectTheme_template_redirect() {
    global $wp;
    global $wp_query, $post, $wp_rewrite;
    if(isset($_GET['_ad_delete_pid'])) {
        if(is_user_logged_in()) {
            $pid	= $_GET['_ad_delete_pid'];
            $pstpst = get_post($pid);
            global $current_user;
            $current_user = wp_get_current_user();
            wp_delete_post($_GET['_ad_delete_pid']);
        }
        exit;
    }


    if(isset($_GET['my_upload_of_project_files']))
    {
        get_template_part( 'lib/upload_main/uploady2');
        die();
    }

    if(isset($_GET['my_upload_of_project_files_proj']))
    {
        get_template_part( 'lib/upload_main/uploady5');
        die();
    }


    if(isset($_GET['my_upload_of_project_files2']))
    {
        get_template_part( 'lib/upload_main/uploady');
        die();
    }

    if(isset($_GET['alert_ipn']))
    {
        projectTheme_alert_pay_IPN(); die();
    }

    if(isset($_GET['my_upload_of_project_files8']))
    {
        get_template_part( 'lib/upload_main/uploady8');
        die();
    }

    if(isset($_GET['complete_paypal_escrow']))
    {
        get_template_part( 'lib/gateways/complete_paypal_escrow');
        die();
    }

    if(isset($_GET['get_subcats_for_me']))
    {
        $cat_id = $_POST['queryString'];
        if(empty($cat_id) ) { echo " "; }
        else
        {

            $args2 = "orderby=name&order=ASC&hide_empty=0&parent=".$cat_id;
            $sub_terms2 = get_terms( 'project_cat', $args2 );

            if(count($sub_terms2) > 0)
            {

                $ret = '<select class="do_input_new" name="subcat">';
                $ret .= '<option value="">'.__('Select Subcategory','ProjectTheme'). '</option>';

                foreach ( $sub_terms2 as $sub_term2 )
                {
                    $sub_id2 = $sub_term2->term_id;
                    $ret .= '<option '.($selected == $sub_id2 ? "selected='selected'" : " " ).' value="'.$sub_id2.'">'.$sub_term2->name.'</option>';

                }
                $ret .= "</select>";
                echo $ret;

            }
        }

        die();
    }


    if(isset($_GET['get_locscats_for_me']))
    {
        $cat_id = $_POST['queryString'];
        if(empty($cat_id) ) { echo " "; }
        else
        {

            $args2 = "orderby=name&order=ASC&hide_empty=0&parent=".$cat_id;
            $sub_terms2 = get_terms( 'project_location', $args2 );

            if(count($sub_terms2) > 0)
            {

                $ret = '<select class="do_input_new" name="subloc" onchange="display_subcat3(this.value)">';
                $ret .= '<option value="">'.__('Select Sublocation','ProjectTheme'). '</option>';

                foreach ( $sub_terms2 as $sub_term2 )
                {
                    $sub_id2 = $sub_term2->term_id;
                    $ret .= '<option '.($selected == $sub_id2 ? "selected='selected'" : " " ).' value="'.$sub_id2.'">'.$sub_term2->name.'</option>';

                }
                $ret .= "</select>";
                echo $ret;

            }
        }

        die();
    }

    if(isset($_GET['set_image_for_term']))
    {
        if(is_user_logged_in())
        {
            $term_id = $_GET['term_id'];
            $attachment_id = $_GET['att_id'];
            //if(empty($attachment_id)) $attachment_id = $_GET['att_id'];
            delete_post_meta($attachment_id, 'category_image');
            add_post_meta($attachment_id, 'category_image', $term_id);
        }



        //echo "asd";
        die();
    }

    //---------------------------

    if(isset($_GET['get_locscats_for_me2']))
    {
        $cat_id = $_POST['queryString'];
        if(empty($cat_id) ) { echo " "; }
        else
        {

            $args2 = "orderby=name&order=ASC&hide_empty=0&parent=".$cat_id;
            $sub_terms2 = get_terms( 'project_location', $args2 );

            if(count($sub_terms2) > 0)
            {

                $ret = '<select class="do_input_new" name="subloc2" >';
                $ret .= '<option value="">'.__('Select Sublocation','ProjectTheme'). '</option>';

                foreach ( $sub_terms2 as $sub_term2 )
                {
                    $sub_id2 = $sub_term2->term_id;
                    $ret .= '<option '.($selected == $sub_id2 ? "selected='selected'" : " " ).' value="'.$sub_id2.'">'.$sub_term2->name.'</option>';

                }
                $ret .= "</select>";
                echo $ret;

            }
        }

        die();
    }

    //---------------------------------------------------

    if(isset($_GET['redirect_search']))
    {
        if($_POST['redirect_search'] == "freelancers")
        {
            $string = "username=" . urlencode($_POST['input_text_serch']);
            $ProjectTheme_provider_search_page_id = get_permalink(get_option('ProjectTheme_provider_search_page_id'));

            $perm = ProjectTheme_using_permalinks();
            if($perm == true)
            {
                wp_redirect($ProjectTheme_provider_search_page_id . "?" . $string);
            }
            else
            {
                wp_redirect($ProjectTheme_provider_search_page_id . "&" . $string);
            }

        }
        else
        {
            $string = "term=" . urlencode($_POST['input_text_serch']);
            $ProjectTheme_advanced_search_page_id = get_permalink(get_option('ProjectTheme_advanced_search_page_id'));

            $perm = ProjectTheme_using_permalinks();
            if($perm == true)
            {
                wp_redirect($ProjectTheme_advanced_search_page_id . "?" . $string);
            }
            else
            {
                wp_redirect($ProjectTheme_advanced_search_page_id . "&" . $string);
            }

        }

        exit;
    }

    if(isset($_GET['get_my_project_vl_thing']))
    {
        $pids = $_POST['queryString'];
        if($pids == 0) { echo 0; die(); }

        $bid = projectTheme_get_winner_bid($pids);

        echo $bid->bid;

        die();
    }

    $my_pid = $post->ID; $parent = $post->post_parent;
    $paagee 	=  $wp_query->query_vars['my_custom_page_type'];
    $p_action 	=  $wp_query->query_vars['p_action'];

    $ProjectTheme_my_account_page_id					= get_option('ProjectTheme_my_account_page_id');
    $ProjectTheme_post_new_page_id						= get_option('ProjectTheme_post_new_page_id');
    $ProjectTheme_my_account_page_id					= get_option('ProjectTheme_my_account_page_id');

    //-------------

    if(isset($_GET['redir1']))
    {
        $_SESSION['redir1'] = $_GET['redir1'];
    }

    if(($parent == $ProjectTheme_my_account_page_id or $my_pid == get_option('ProjectTheme_my_account_milestones_id')) and !empty($my_pid) )
    {
        if(!is_user_logged_in())	{ wp_redirect(ProjectTheme_login_url()); exit; }
    }

    //-------------

    $ProjectTheme_enable_2_user_tp = get_option('ProjectTheme_enable_2_user_tp');

    if($ProjectTheme_enable_2_user_tp == "yes" && $p_action != 'choose_user_tp')
    {
        if(is_user_logged_in())
        {
            global $current_user;
            $current_user = wp_get_current_user();

            $user_tp = get_user_meta($current_user->ID, 'user_tp' ,true);
            if(empty($user_tp) && !current_user_can('level_10'))
            {
                wp_redirect(home_url() . "/?p_action=choose_user_tp"); exit;
            }

        }
    }



    if ($p_action == "retract_bid")
    {

        get_template_part('lib/retract_bid');
                die();
    }




    if ($p_action == "payza_listing")
    {

        get_template_part('lib/gateways/payza_listing');
        die();
    }

    if ($p_action == "workspaces")
        {

        get_template_part('lib/workspaces_chat');
                die();
    }




    if(isset($_GET['notify_chained']))
    {

        if($_POST['status'] == "INCOMPLETE" )
        {
            $trID 	= $_POST['tracking_id'];
            $trID 	= explode("_",$trID);
            $pid 	= $trID[0];


            update_post_meta($pid, 'outstanding',"1");
            //update_post_meta($pid, 'paid_user',"1");
            //update_post_meta($pid, "paid_user_date", current_time('timestamp',0));
            update_post_meta($pid, "adaptive_done", "started");
            $projectTheme_get_winner_bid = projectTheme_get_winner_bid($pid);
             ProjectTheme_send_email_on_escrow_project_to_bidder($pid, $projectTheme_get_winner_bid->uid, $_POST['amount']);
             ProjectTheme_send_email_on_escrow_project_to_owner($pid, $_POST['amount']);
            //$projectTheme_get_winner_bid = projectTheme_get_winner_bid($pid);
            //ProjectTheme_send_email_when_on_completed_project($pid, $projectTheme_get_winner_bid->uid, $projectTheme_get_winner_bid->bid);

        }
    }

    if(isset($_GET['return_chained']))


    {
        $ret_id = $_GET['return_chained'];
        $pid_d = get_option('adaptive_payment_ID_thing_' . $ret_id);





        wp_redirect(get_permalink(get_option('ProjectTheme_my_account_awaiting_completion_id')));
        exit;
    }

    //------------

    if($my_pid == $ProjectTheme_post_new_page_id) {
        if(!is_user_logged_in())	{
            wp_redirect(ProjectTheme_login_url(). '?redirect_to=' . urlencode(get_permalink($ProjectTheme_post_new_page_id)));
            exit;
        }
        global $current_user;
        $current_user = wp_get_current_user();

        if(!ProjectTheme_is_user_business($current_user->ID)) { wp_redirect(home_url()); exit; }

        if(!isset($_GET['projectid'])) $set_ad = 1; else $set_ad = 0;


        if(!empty($_GET['projectid']))
        {
            $my_main_post = get_post($_GET['projectid']);
            $cu = wp_get_current_user();

            if($my_main_post->post_author != $current_user->ID and $cu->user_login != 'sitemileadmin')
            {
                wp_redirect(home_url()); exit;
            }

        }

        if($set_ad == 1)
        {
            $pid 		= ProjectTheme_get_auto_draft($current_user->ID);
            wp_redirect(ProjectTheme_post_new_with_pid_stuff_thg($pid));
        }

        get_template_part( 'lib/post_new_post');
    }

    //-------------

    if($my_pid == $ProjectTheme_my_account_page_id)
    {
        if(!is_user_logged_in())	{ wp_redirect(ProjectTheme_login_url()); exit; }
    }


    //----------------------------------------------------

    if ($p_action == "choose_user_tp")
    {
        get_template_part('lib/choose_user_tp');
        die();
    }

    if(isset($_GET['autosuggest']))
    { get_template_part ('autosuggest'); }

    if ($p_action == "mark_delivered")
    {
        get_template_part('lib/my_account/mark_delivered');
        die();
    }

    if ($p_action == "mark_completed")
    {
        get_template_part('lib/my_account/mark_completed');
        die();
    }

    if ($p_action == "credits_listing")
    {
        get_template_part('lib/gateways/credits_listing');
        die();
    }

    if ($p_action == "relist_this_done")
    {
        get_template_part('lib/my_account/relist_this_done');
        die();
    }

    if ($p_action == "mb_listing_response")
    {
        get_template_part('lib/gateways/moneybookers_listing_response');
        die();
    }

    if ($p_action == "mb_listing")
    {
        get_template_part('lib/gateways/moneybookers_listing');
        die();
    }

    if ($p_action == "paypal_listing")
    {
        get_template_part('lib/gateways/paypal_listing');
        die();
    }

    if ($p_action == "pay_for_project_paypal")
    {
        get_template_part('lib/gateways/pay_for_project_paypal');
        die();
    }

    if ($p_action == "edit_project")
    {
        get_template_part('lib/my_account/edit_project');
        die();
    }

    if ($p_action == "rate_user")
    {
        get_template_part('lib/my_account/rate_user');
        die();
    }

    if ($p_action == "workspaces")
    {
        get_template_part('lib/workspace_chat');
        die();
    }

    if ($p_action == "choose_winner")
    {
        get_template_part('lib/choose_winner');
        die();
    }

    if ($p_action == "user_profile")
    {
        get_template_part('lib/user-profile');
        die();
    }

    if ($p_action == "user_feedback")
    {
        get_template_part('lib/user-feedback');
        die();
    }

    if ($p_action == "delete_project")
    {
        get_template_part('lib/my_account/delete_project');
        die();
    }

    if ($p_action == "repost_project")
    {
        get_template_part('lib/my_account/repost_project');
        die();

    }

    if ($p_action == "paypal_deposit_pay")
    {
        get_template_part('lib/gateways/paypal_deposit_pay');
        die();
    }
    if ($p_action == "payza_deposit_pay")
    {
        get_template_part('lib/gateways/payza_deposit_pay');
        die();
    }

    if ($p_action == "mb_deposit_response")
    {
        get_template_part('lib/gateways/mb_deposit_response');
        die();
    }

    if ($p_action == "mb_deposit_pay")
    {
        get_template_part('lib/gateways/mb_deposit_pay');
        die();
    }


    if ($paagee == "pay_projects_by_credits")
    {
        get_template_part('lib/pay-projects-by-credits');
        die();
    }


    if ($paagee == "show-all-categories")
    {
        get_template_part('lib/show-all-categories');
        die();
    }

    if ($paagee == "show-all-locations")
    {
        get_template_part('lib/show-all-locations');
        die();
    }

    if ($paagee == "post-new")
    {
        get_template_part('post-new');
        die();
    }


    if ($paagee == "pay_paypal")
    {
        get_template_part('lib/gateways/paypal');
        die();
    }


    if ($paagee == "advanced_search")
    {
        get_template_part('lib/advanced-search');
        die();
    }

    if ($paagee == "alert-pay-return")
    {
        get_template_part('lib/gateways/alert-pay-return');
        die();
    }


    if (isset($_GET['get_files_panel']))
    {
        get_template_part('lib/get_files_panel');
        die();
    }

    if (isset($_GET['get_bidding_panel']))
    {
        get_template_part('lib/bidding-panel');
        die();
    }

    if (isset($_GET['get_message_board']))
    {
        get_template_part('lib/message-board');
        die();
    }


    if ($paagee == "all-blog-posts")
    {
        get_template_part('lib/blog');
        die();
    }


    if ($paagee == "all_featured_projects")
    {
        get_template_part('lib/all_featured_projects');
        die();
    }




    if ($paagee == "user_feedback")
    {
        get_template_part('lib/user-feedback');
        die();
    }



    if ($paagee == "buy_now")
    {
        get_template_part('lib/buy-now');
        die();
    }

    if ($paagee == "pay-for-project")
    {
        get_template_part('lib/gateways/paypal-project');
        die();
    }

    if ($paagee == "deposit_pay")
    {
        get_template_part('lib/gateways/deposit-pay');
        die();
    }
}

/* Function that shows the User's Bids (in the Admin User page) */
function greysell_user_bids( $user ) { ?>
	<h3>Bid information</h3>
	<table class="form-table">
		<tr>
			<th><label for="myBids">Bids</label></th>
			<td>
				<input type="number" name="myBids" id="myBids" value="<?php echo intval(esc_attr( get_the_author_meta( 'myBids', $user->ID ) )); ?>" class="regular-text" /><br />
				<span class="description">Please enter your Bids.</span>
			</td>
    </tr>
    <tr>
      <th><label for="myBids">Bids remaining</label></th>
        <td>
          <h4><?php echo intval(esc_attr( get_the_author_meta( 'myBids', $user->ID ) )); ?> </h4>
        </td>
		</tr>
	</table>
<?php }
add_action( 'show_user_profile', 'greysell_user_bids' );
add_action( 'edit_user_profile', 'greysell_user_bids' );

// function greysell_user_bids_reset( $user_id ) {}

/* Function that sets the User's Bids' (number to the one given in the Admin) */
function greysell_user_bids_set( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

        update_usermeta( $user_id, 'myBids', $_POST['myBids'] );
}
add_action( 'personal_options_update', 'greysell_user_bids_set' );
add_action( 'edit_user_profile_update', 'greysell_user_bids_set' );

/* */
function greysell_set_bids_to_zero($user_id) {
    if ( !current_user_can( 'edit_user', $user_id ) )
        return false;
    update_usermeta( $user_id, 'myBids', $_POST[0] );
}

//set user bids to 0 right after registration
function greysell_user_bids_zero( $user_id ) {
   $zero = ‘0’;
   update_user_meta( $user_id, 'myBids', $zero );
   update_user_meta( $user_id, 'freeTrial', $zero );
   choose_plan (4, $user_id);
}
add_action( 'user_register', 'greysell_user_bids_zero', 10, 1 );

function greysell_add_extra_bids_to_user($user_id, $bids) {
  //get existing bids
  $oldBids = get_the_author_meta( 'myBids', $user->ID );
  //add new Bids
  $finalBids = $oldBids + $bids;
  //update user bids
  update_user_meta( $user_id, 'myBids', $finalBids );
}
add_action( 'after_payment', 'greysell_add_extra_bids_to_user',10, 5 );

function greysell_reduce_bids ($user_id) {
  //get user Bids
  $bids = get_the_author_meta( 'myBids', $user_id );
  //bids -1
  if ($bids > 0) {
    $bids = $bids - 1;
  }

  // Check if Bids are less than Sealed Bids in which case we make SealedBids = bids
  $sealed_bids = get_the_author_meta( 'mySealedBids', $user_id );

  if($sealed_bids > $bids) {
      $sealed_bids = $bids;
      update_user_meta( $user_id, 'mySealedBids', $sealed_bids );
  }

  //update user meta
  update_user_meta( $user_id, 'myBids', $bids );
}

/* Function that shows the User's Bids (in the Admin User page) */
function greysell_user_sealed_bids( $user ) { ?>
	<table class="form-table">
		<tr>
			<th><label for="mySealedBids">Sealed Bids</label></th>
			<td>
				<input type="number" name="mySealedBids" id="mySealedBids" value="<?php echo intval(esc_attr( get_the_author_meta( 'mySealedBids', $user->ID ) )); ?>" class="regular-text" /><br />
				<span class="description">Please enter your Sealed Bids.</span>
			</td>
    </tr>
    <tr>
      <th><label for="mySealedBids">Sealed Bids remaining</label></th>
        <td>
          <h4><?php echo intval(esc_attr( get_the_author_meta( 'mySealedBids', $user->ID ) )); ?> </h4>
        </td>
		</tr>
	</table>
<?php }
add_action( 'show_user_profile', 'greysell_user_sealed_bids' );
add_action( 'edit_user_profile', 'greysell_user_sealed_bids' );

/* Function that sets the User's Bids' (number to the one given in the Admin) */
function greysell_user_sealed_bids_set( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

        update_usermeta( $user_id, 'mySealedBids', $_POST['mySealedBids'] );
}
add_action( 'personal_options_update', 'greysell_user_sealed_bids_set' );
add_action( 'edit_user_profile_update', 'greysell_user_sealed_bids_set' );

/* */
function greysell_set_sealed_bids_to_zero($user_id) {
    if ( !current_user_can( 'edit_user', $user_id ) )
        return false;
    update_usermeta( $user_id, 'mySealedBids', $_POST[0] );
}

//set user bids to 0 right after registration
function greysell_user_sealed_bids_zero( $user_id ) {
   $zero = ‘0’;
   update_user_meta( $user_id, 'mySealedBids', $zero );
}
add_action( 'user_register', 'greysell_user_sealed_bids_zero', 10, 15 );

function greysell_add_extra_sealed_bids_to_user($user_id, $bids) {
  //get existing bids
  $oldBids = get_the_author_meta( 'mySealedBids', $user->ID );
  //add new Bids
  $finalBids = $oldBids + $bids;
  //update user bids
  update_user_meta( $user_id, 'mySealedBids', $finalBids );
}
add_action( 'after_payment', 'greysell_add_extra_sealed_bids_to_user',10, 20 );

function greysell_reduce_sealed_bids ($user_id) {
  //get user Bids
  $bids = get_the_author_meta( 'mySealedBids', $user_id );
  //bids -1
  if ($bids > 0) {
    $bids = $bids - 1;
  }
  //update user meta
  update_user_meta( $user_id, 'mySealedBids', $bids );
}

/* Function that adds Bids and Sealed Bids to a User when he choosed a plan */

  function choose_plan ($planID, $user_id) {
    global $wpdb;
    $myrows = $wpdb->get_results( "SELECT * FROM `greysell_plans`" );

    foreach($myrows as $row) {
      if ($planID == $row->id) {
        $id = $row->id;
        $bids = $row->bids;
        $sealed_bids = $row->sealed_bids;

        //update user meta
        //get existing bids and add extra
        $currentBids = get_the_author_meta( 'myBids', $user_id );
        $finalBids = $currentBids + $bids;
        update_user_meta( $user_id, 'myBids', $finalBids );

        $currentSealedBids = get_the_author_meta( 'mySealedBids', $user_id );
        $finalSealedBids = $currentSealedBids + $sealed_bids;

        // Check if the final Sealed Bids are more than Bids, in which case Sealed Bids = Bids
        if($finalSealedBids > $finalBids) {
            $finalSealedBids = $finalBids;
        }

        update_user_meta( $user_id, 'mySealedBids', $finalSealedBids );
        update_user_meta( $user_id, 'planId', $planID );
        break;
      }
    }
  }
  add_action( 'after_paypal', 'choose_plan',30, 2 );

/* Function that shows the User's Plan ID (in the Admin User page) */
function greysell_user_planId( $user ) { ?>
	<table class="form-table">
		<tr>
			<th><label for="planId">Plan ID</label></th>
			<td>
				<input type="number" name="planId" id="planId" value="<?php echo intval(esc_attr( get_the_author_meta( 'planId', $user->ID ) )); ?>" class="regular-text" /><br />
				<span class="description">Please enter your planId.</span>
			</td>
    </tr>
    <tr>
      <th><label for="mySealedBids">Current Plan ID</label></th>
        <td>
          <h4><?php echo intval(esc_attr( get_the_author_meta( 'planId', $user->ID ) )); ?> </h4>
        </td>
		</tr>
	</table>
<?php }
add_action( 'show_user_profile', 'greysell_user_planId' );
add_action( 'edit_user_profile', 'greysell_user_planId' );

/* Function that sets the User's Bids' (number to the one given in the Admin) */
function greysell_user_set_planId( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

        update_usermeta( $user_id, 'planId', $_POST['planId'] );
}
add_action( 'personal_options_update', 'greysell_user_set_planId' );
add_action( 'edit_user_profile_update', 'greysell_user_set_planId' );

/* Function Override from parent Project Theme for calculating Bids' average bid */
function ProjectTheme_average_bid($pid)
{
    // check for if the current user is the Contractor that owns the project, to whom we must show the average bid
    global $current_user;
    $current_user = wp_get_current_user();
    $post = get_post(get_the_ID());
    if($post->post_author == $current_user->ID) $owner = 1; else $owner = 0;

    global $wpdb;
    $s = "select * from ".$wpdb->prefix."project_bids where pid='$pid'";
    $r = $wpdb->get_results($s);
    $numOfSealedBids = 0;

    if(count($r) == 0)	return __('No bids placed yet.','ProjectTheme');
    else
    {
        $s = 0; $i = 0;

        foreach($r as $row):
            if($row->sealed == 0 or $row->sealed == '0' or $row->sealed == false or empty($row->sealed) or $owner == 1) {
                $s += $row->bid;
                $i++;
            }
            else {
                $numOfSealedBids++;
            }
        endforeach;

        // if all bids are sealed
        if(count($r) == $numOfSealedBids){
            return __('All Bids are Sealed.','ProjectTheme');
        } else {
            return ProjectTheme_get_show_price(floor($s/$i));
        }
    }
}

/* Functions for Shortcodes for WPBakery to show Plan Details */
/* They have as default PlanID the $_GET['id'] that will take from the single plan page */
/* Shortcode to show name */
function greysell_show_plan_name_vc ($atts) {
    global $wpdb;
    $plan_id = do_shortcode('[vc_get_plan_id_shortcode]');

    $a = shortcode_atts( array(
        'plan_id' => $plan_id,
    ), $atts);

    $planID = $a['plan_id'];

    $query = "select name from `greysell_plans` where id = ".$planID;
    $results = $wpdb->get_results($query);

    $name = $results[0]->name;

    return $name;
}
add_shortcode('vc_plan_name_shortcode', 'greysell_show_plan_name_vc');

/* Shortcode to show price */
function greysell_show_plan_price_vc ($atts) {
    global $wpdb;
    $plan_id = do_shortcode('[vc_get_plan_id_shortcode]');

    $a = shortcode_atts( array(
        'plan_id' => $plan_id,
    ), $atts);

    $planID = $a['plan_id'];

    $query = "select price from `greysell_plans` where id = ".$planID;
    $results = $wpdb->get_results($query);

    $price = $results[0]->price;

    return $price;
}
add_shortcode('vc_plan_price_shortcode', 'greysell_show_plan_price_vc');

/* Shortcode to show bids */
function greysell_show_plan_bids_vc ($atts) {
    global $wpdb;
    $plan_id = do_shortcode('[vc_get_plan_id_shortcode]');

    $a = shortcode_atts( array(
        'plan_id' => $plan_id,
    ), $atts);

    $planID = $a['plan_id'];

    $query = "select bids from `greysell_plans` where id = ".$planID;
    $results = $wpdb->get_results($query);

    $bids = $results[0]->bids;

    return $bids;
}
add_shortcode('vc_plan_bids_shortcode', 'greysell_show_plan_bids_vc');

/* Shortcode to show sealed bids */
function greysell_show_plan_sealed_bids_vc ($atts) {
    global $wpdb;
    $plan_id = do_shortcode('[vc_get_plan_id_shortcode]');

    $a = shortcode_atts( array(
        'plan_id' => $plan_id,
    ), $atts);

    $planID = $a['plan_id'];

    $query = "select sealed_bids from `greysell_plans` where id = ".$planID;
    $results = $wpdb->get_results($query);

    $sealed_bids = $results[0]->sealed_bids;

    return $sealed_bids;
}
add_shortcode('vc_plan_sealed_bids_shortcode', 'greysell_show_plan_sealed_bids_vc');

/* Function that shows the User's free Trial Status (in the Admin User page) */
function greysell_user_trial( $user ) { ?>
	<table class="form-table">
		<tr>
			<th><label for="freeTrial">Free trial</label></th>
			<td>
				<input type="number" name="freeTrial" id="freeTrial" value="<?php echo intval(esc_attr( get_the_author_meta( 'freeTrial', $user->ID ) )); ?>" class="regular-text" /><br />
				<span class="description">Please edit free trial status (0 or 1).</span>
			</td>
    </tr>
    <tr>
      <th><label for="freeTrial">Current Free Trial Status</label></th>
        <td>
          <h4><?php echo intval(esc_attr( get_the_author_meta( 'freeTrial', $user->ID ) )); ?> </h4>
        </td>
		</tr>
	</table>
<?php }
add_action( 'show_user_profile', 'greysell_user_trial' );
add_action( 'edit_user_profile', 'greysell_user_trial' );

/* Function that sets the User's Bids' (number to the one given in the Admin) */
function greysell_freeTrial_set( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

        update_usermeta( $user_id, 'freeTrial', $_POST['freeTrial'] );
}
add_action( 'personal_options_update', 'greysell_freeTrial_set' );
add_action( 'edit_user_profile_update', 'greysell_freeTrial_set' );

/* Function and Shortcode for Visual Composer to get Plan's ID from url */
function greysell_get_plan_id_vc () {
    $planID = $_GET['id'];
    return $planID;
}
add_shortcode('vc_get_plan_id_shortcode', 'greysell_get_plan_id_vc');
?>

<?php
/* Function that shows the User's activation status (in the Admin User page) */
function greysell_user_activation( $user ) { ?>
	<table class="form-table">
		<tr>
			<th><label for="account_activated">Activation status</label></th>
			<td>
				<input type="number" name="account_activated" id="account_activated" value="<?php echo intval(esc_attr( get_the_author_meta( 'account_activated', $user->ID ) )); ?>" class="regular-text" /><br />
				<span class="description">Please edit activation status.</span>
			</td>
    </tr>
    <tr>
      <th><label for="account_activated">Current activation status</label></th>
        <td>
          <h4><?php echo intval(esc_attr( get_the_author_meta( 'account_activated', $user->ID ) )); ?> </h4>
        </td>
		</tr>
	</table>
<?php }
add_action( 'show_user_profile', 'greysell_user_activation' );
add_action( 'edit_user_profile', 'greysell_user_activation' );

/* Function that sets the User's activation status (number to the one given in the Admin) */
function greysell_user_account_activated_set( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

        update_usermeta( $user_id, 'account_activated', $_POST['account_activated'] );
}
add_action( 'personal_options_update', 'greysell_user_account_activated_set' );
add_action( 'edit_user_profile_update', 'greysell_user_account_activated_set' );


/* Hook to forbid Admin Backend access to users */
add_action( 'init', 'blockusers_init' );
function blockusers_init() {
    if ( is_admin() && ! current_user_can( 'administrator' ) &&
       ! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {
        wp_redirect( home_url() );
        exit;
    }
}


/* Function Override from Parent Theme */
function projectTheme_theme_project_dts()
{
	global $post;
	$pid = $post->ID;
	$price = get_post_meta($pid, "price", true);
	$location = get_post_meta($pid, "Location", true);
	$f = get_post_meta($pid, "featured", true);
	$t = get_post_meta($pid, "closed", true);
	$hide_project = get_post_meta($pid, "hide_project", true);
	?>

    <ul id="post-new4">
    <input name="fromadmin" type="hidden" value="1" />

        <?php

			do_action('ProjectTheme_project_dts_form', $pid);

			$filter_price = true;
			$filter_price = apply_filters("ProjectTheme_filter_price_field_admin", $filter_price);

			if($filter_price == true):

		?>
        <li>
        	<h2><?php echo __('Price','ProjectTheme'); ?>:</h2>
        <p>

        <?php

		  $sel = get_post_meta($pid, 'budgets', true);
		  echo ProjecTheme_get_budgets_dropdown($sel, 'do_input');

	  ?>

        </p>
        </li>

       <?php endif; ?>

    	<li>
        	<h2><?php echo __('Sealed Bids','ProjectTheme'); ?>:</h2>
        <p><select name="private_bids">
        <option value="0" <?php if(get_post_meta($pid,'private_bids',true) == "0") echo 'selected="selected"'; ?>><?php _e("No",'ProjectTheme'); ?></option>
        <option value="1" <?php if(get_post_meta($pid,'private_bids',true) == "1") echo 'selected="selected"'; ?>><?php _e("Yes",'ProjectTheme'); ?></option>

        </select>
        </p>
        </li>

     	<li>
        <h2><?php _e("Feature this project",'ProjectTheme');?>:</h2>
        <p><input type="checkbox" value="1" name="featureds" <?php if($f == '1') echo ' checked="checked" '; ?> /></p>
        </li>


        <li>
        <h2><?php _e("Hide this project",'ProjectTheme');?>:</h2>
        <p><input type="checkbox" value="1" name="hide_project" <?php if($hide_project == '1') echo ' checked="checked" '; ?> /></p>
        </li>


        <li>
        <h2><?php _e("Closed",'ProjectTheme');?>:</h2>
        <p><input type="checkbox" value="1" name="closed" <?php if($t == '1') echo ' checked="checked" '; ?> /></p>
        </li>


        <li>
        <h2><?php _e("Address",'ProjectTheme');?>:</h2>
        <p><input type="text" value="<?php echo get_post_meta($pid,'Location',true); ?>" name="Location" /></p>
        </li>




        <li>
            <h2>
                <link rel="stylesheet" media="all" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ui-thing.css" />
                <?php _e("Bids Ending On",'ProjectTheme'); ?>:
            </h2>
            <p>
                <input type="text"
                    name="ending"
                    id="ending"
                    value=" <?php $d = get_post_meta($pid,'ending',true);
                            if(!empty($d)) {
                                $r = date_i18n('m/d/Y H:i:s', $d);
                                echo $r;
                            } ?>"
                    class="do_input"
                />
            </p>
        </li>

        <li>
            <h2>
                <link rel="stylesheet" media="all" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ui-thing.css" />
                <?php _e("Project Ending On",'ProjectTheme'); ?>:
            </h2>
            <p>
                <input type="text"
                    name="project_ending"
                    id="project_ending"
                    value="<?php $pd = get_post_meta($pid,'project_ending',true);
                            if(!empty($pd)) {
                                $r = date_i18n('m/d/Y H:i:s', $pd);
                                echo $r;
                            } ?>"
                    class="do_input"
                />
            </p>
        </li>

        <script>
            var projectEndingMinDate = new Date('<?php echo date('F j, Y g:i:s', get_post_meta($pid, 'ending', true)) ?>');
            projectEndingMinDate.setDate(projectEndingMinDate.getDate() + 1);
            jQuery(document).ready(function() {
                jQuery('#ending').datepicker({
                    showSecond: true,
                    minDate: new Date(),
                    timeFormat: 'hh:mm:ss',
                    onSelect: function (date) {
                        var date2 = $('#ending').datepicker('getDate');
                        var nextDayDate = $('#ending').datepicker('getDate', '+1d');
                        nextDayDate.setDate(nextDayDate.getDate() + 1);
                        $('#project_ending').datepicker('option', 'minDate', nextDayDate);
                    }
                });
            });
            jQuery(document).ready(function() {
                jQuery('#project_ending').datepicker({
                    showSecond: true,
                    minDate: projectEndingMinDate,
                    timeFormat: 'hh:mm:ss'
                });
            });
        </script>
	</ul>

	<?php
}

/* Function Override from ParentTheme */
function projectTheme_save_custom_fields($pid)
{
	$pst = get_post($pid);

	if($pst->post_type == "project"):
	if(isset($_POST['fromadmin']))
	{

		update_post_meta($pid, 'finalised_posted', '1');

        $ending = get_post_meta($pid,"ending",true);
        $project_ending = get_post_meta($pid, 'project_ending', true);

		$views = get_post_meta($pid,"views",true);
		$closed = get_post_meta($pid,"closed",true);

        $reverse = get_post_meta($pid, "reverse", true);

        // Get the end of both dates
        $newEnding = strtotime($_POST['ending']);
        $newProjectEnding = strtotime($_POST['project_ending']);

        $beginOfDay = strtotime("midnight", $newEnding);
        $newEnding   = strtotime("tomorrow", $beginOfDay) - 1;

        $beginOfDay = strtotime("midnight", $newProjectEnding);
        $newProjectEnding   = strtotime("tomorrow", $beginOfDay) - 1;

        update_post_meta($pid,"ending", $newEnding);
        update_post_meta($pid, 'project_ending', $newProjectEnding);
		if(empty($views)) update_post_meta($pid,"views",0);


		if($reverse == "yes") update_post_meta($pid, "reverse", "yes");
		else update_post_meta($pid, "reverse", "no");

		update_post_meta($pid, "budgets", $_POST["budgets"]);

		if($_POST['hide_project'] == '1')
		update_post_meta($pid,"hide_project",'1');
		else
		update_post_meta($pid,"hide_project",'0');


		if($_POST['featureds'] == '1')
		update_post_meta($pid,"featured",'1');
		else
		update_post_meta($pid,"featured",'0');

		if($_POST['closed'] == '1')
			{

				update_post_meta($pid,"closed",'1');
			}
		else
		{
			if($closed == "1") {
                update_post_meta($pid,"ending",current_time('timestamp',0) + 30*24*3600);
                update_post_meta($pid,"project_ending",current_time('timestamp',0) + 30*24*3600);
            }
			update_post_meta($pid,"closed",'0');

		}

				if(isset($_POST['private_bids']))
				update_post_meta($pid, "private_bids", $_POST['private_bids']);


		if(isset($_POST['price']))
		update_post_meta($pid,"price",$_POST['price']);

		if(isset($_POST['Location']))
		update_post_meta($pid,"Location",$_POST['Location']);

		for($i=0;$i<count($_POST['cust_ids']);$i++)
		{
			$id = $_POST['cust_ids'][$i];
			$valval = $_POST['custom_field_value_'.$id];

			if(is_array($valval))
			{
				delete_post_meta($pid, 'custom_field_ID_'.$id);

				for($k=0;$k<count($valval);$k++)
					add_post_meta($pid, 'custom_field_ID_'.$id, $valval[$k]);
			}
			else
			update_post_meta($pid, 'custom_field_ID_'.$id, $valval);
		}

			do_action('ProjectTheme_execute_on_submit_1', $pid);
		}

		update_post_meta($pid,'unpaid','0');

	endif;
}



function greysell_projects_in_api() {
  global $wp_post_types;
  //be sure to set this to the name of your post type!
  $post_type_name = 'project';
  if( isset( $wp_post_types[ $post_type_name ] ) ) {
    $wp_post_types[$post_type_name]->show_in_rest = true;
    // Optionally customize the rest_base or controller class
    $wp_post_types[$post_type_name]->rest_base = $post_type_name;
    $wp_post_types[$post_type_name]->rest_controller_class = 'WP_REST_Posts_Controller';
    }
  }
add_action( 'init', 'greysell_projects_in_api', 25 );

/* Hook with functions to add Project Category, Location, Budget, Dates to JSON Response */
add_action( 'rest_api_init', function () {
    register_rest_field( 'project', 'project_cat', array(
        'get_callback' => function( $post ) {
            $project_cat = wp_get_object_terms($post["id"], 'project_cat',  array('order' => 'ASC', 'orderby' => 'term_id' ));
            return $project_cat;
        },
        'update_callback' => function( $project_cat, $post ) {
            wp_set_object_terms($post["id"], $project_cat, 'project_cat');
            return true;
        },
        'schema' => array(
            'description' => __( 'Project Category.' ),
            'type'        => 'string'
        ),
    ));

    register_rest_field( 'project', 'project_loc', array(
        'get_callback' => function( $post ) {
            $project_loc = wp_get_object_terms($post["id"], 'project_location',  array('order' => 'ASC', 'orderby' => 'term_id' ));
            return $project_loc;
        },
        'update_callback' => function( $project_loc, $post ) {
            wp_set_object_terms($post["id"], $project_loc, 'project_location');
            return true;
        },
        'schema' => array(
            'description' => __( 'Project Location.' ),
            'type'        => 'string'
        ),
    ));

    register_rest_field( 'project', 'project_budget', array(
        'get_callback' => function( $post ) {
            $project_budget = get_post_meta($post["id"], 'budgets', true);
            return $project_budget;
        },
        'update_callback' => function( $project_budget, $post ) {
            update_post_meta($post["id"], "budgets", $project_budget);
            return true;
        },
        'schema' => array(
            'description' => __( 'Project Budget.' ),
            'type'        => 'string'
        ),
    ));

    register_rest_field( 'project', 'ending_date', array(
        'get_callback' => function( $post ) {
            $dt = get_post_meta($post["id"], 'ending', true);
            return $dt;
        },
        'update_callback' => function( $ending, $post ) {
            update_post_meta($post["id"], "ending", $ending);
            return true;
        },
        'schema' => array(
            'description' => __( 'Project Bids Ending Date.' ),
            'type'        => 'string'
        ),
    ));

    register_rest_field( 'project', 'project_ending_date', array(
        'get_callback' => function( $post ) {
            $dt = get_post_meta($post["id"], 'project_ending', true);
            return $dt;
        },
        'update_callback' => function( $project_ending, $post ) {
            update_post_meta($post["id"], "project_ending", $project_ending);
            return true;
        },
        'schema' => array(
            'description' => __( 'Project Ending Date.' ),
            'type'        => 'string'
        ),
    ));
} );

add_action( 'rest_api_init', 'register_api_hooks' );
// API custom endpoints for WP-REST API
function register_api_hooks() {

    register_rest_route(
        'custom-plugin', '/login/',
        array(
            'methods'  => 'POST',
            'callback' => 'login',
        )
    );

    function login() {

        $output = array();

        // Your logic goes here.
        return $output;

    }
  }


/* Function to be called for giving gifts after registration from invitation */
function giveInvitationGifts($oldUserId, $newUserId) {
    // We check the User's type and give gifts accordingly to both the new and the old user
    if(ProjectTheme_is_user_provider($oldUserId)) {
        // For the old user we also check if he has reached the maximum earned bids
        $old_user_earned_bids = get_the_author_meta('earnedBids', $oldUserId);
        $max_earned_bids = get_option('projectTheme_max_earned_bids');

        if($old_user_earned_bids < $max_earned_bids) {
            // We give one Bid to the Provider that invites and also update his earned bids
            $old_user_bids = get_the_author_meta('myBids', $oldUserId);
            update_user_meta($oldUserId, 'myBids', $old_user_bids + 1);
            update_user_meta($oldUserId, 'earnedBids', $old_user_earned_bids + 1);
        }
    } else {
        // Gifts for Contractor who invites
    }

    if(ProjectTheme_is_user_provider($newUserId)) {
        $new_user_bids = get_the_author_meta('myBids', $newUserId);
        update_user_meta( $newUserId, 'myBids', $new_user_bids + 1);
    } else {
        // Gifts for Contractor who is invited
    }
}

/* Function that shows the User's Earned Bids (in the Admin User page) */
function greysell_user_earned_bids( $user ) { ?>
	<table class="form-table">
		<tr>
			<th><label for="earnedBids">Earned Bids</label></th>
			<td>
				<input type="number" name="earnedBids" id="earnedBids" value="<?php echo intval(esc_attr( get_the_author_meta( 'earnedBids', $user->ID ) )); ?>" class="regular-text" /><br />
				<span class="description">Please enter your Earned Bids.</span>
			</td>
    </tr>
    <tr>
      <th><label for="earnedBids">Earned Bids</label></th>
        <td>
          <h4><?php echo intval(esc_attr( get_the_author_meta( 'earnedBids', $user->ID ) )); ?> </h4>
        </td>
		</tr>
	</table>
<?php }
add_action( 'show_user_profile', 'greysell_user_earned_bids' );
add_action( 'edit_user_profile', 'greysell_user_earned_bids' );

/* Function that sets the User's Earned Bids' (number to the one given in the Admin) */
function greysell_user_earned_bids_set( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

        update_usermeta( $user_id, 'earnedBids', $_POST['earnedBids'] );
}
add_action( 'personal_options_update', 'greysell_user_earned_bids_set' );
add_action( 'edit_user_profile_update', 'greysell_user_earned_bids_set' );

function checkloggedinuser()
{
$currentuserid_fromjwt = get_current_user_id();
print_r($currentuserid_fromjwt);
exit;
}

 add_action('rest_api_init', function ()
{
  register_rest_route( 'testone', 'loggedinuser',array(
  'methods' => 'POST',
  'callback' => 'checkloggedinuser'
  ));
});

// Function Override from Parent Theme
function ProjecTheme_get_budgets_dropdown($selected = '', $class = '' , $rui = 0)
{
		$ech = '<select name="budgets" class="'.$class.'" id="'.$class.'">';

		global $wpdb;
		$s = "select * from ".$wpdb->prefix."project_bidding_intervals order by low_limit asc";
		$r = $wpdb->get_results($s);

		if($rui == 1) $ech .= '<option value="">'.__('Select','ProjectTheme').'</option>';

		foreach($r as $row)
		{
			$nm = ProjectTheme_get_budget_name_string($row);
			$ech .= '<option value="'.$row->id.'" '.($row->id == $selected ? 'selected="selected"' : '').'>'.__($nm, 'ProjectTheme').'</option>';

		}

	return $ech.'</select>';

}

/* Function Override from Parent Theme*/
function ProjectTheme_get_budget_name_string_fromID($id)
{
    $budget = true;
    $budget = apply_filters('ProjectTheme_budget_function_filter', $budget);
    $id = esc_sql($id);
    if($budget == true)
    {

        global $wpdb;
        $s = "select * from ".$wpdb->prefix."project_bidding_intervals where id='$id'";
        $r = $wpdb->get_results($s);
        $row = $r[0];

        $nm = $row->bidding_interval_name. " (".ProjectTheme_get_show_price($row->low_limit,0)." - ".ProjectTheme_get_show_price($row->high_limit,0).")";
        return __($nm, 'ProjectTheme');
    }
    else
    {
        return apply_filters('ProjectTheme_other_budget_function_return');
    }
}
?>
