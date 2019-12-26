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


if(!is_user_logged_in()) { wp_redirect(home_url()."/wp-login.php"); exit; }
//-----------

add_filter('sitemile_before_footer', 'projectTheme_my_account_before_footer');
function projectTheme_my_account_before_footer() {
    echo '<div class="clear10"></div>';
}

//----------

global $wpdb,$wp_rewrite,$wp_query;

$bid = projectTheme_get_bid_by_id($wp_query->query_vars['bid']);
$pid = $wp_query->query_vars['pid'];
$winner = get_post_meta($pid, 'winner', true);

if(!empty($winner)) {
    $projectTheme_enable_paypal_ad = get_option('projectTheme_enable_paypal_ad');
    if($projectTheme_enable_paypal_ad == "yes") {
        wp_redirect(get_permalink(get_option('ProjectTheme_my_account_awaiting_completion_id')));	exit;
    }

    //wp_redirect(get_permalink(get_option('ProjectTheme_my_account_page_id')));
    wp_redirect(ProjectTheme_get_payments_page_url2('escrow', $pid)); //get_permalink(get_option('ProjectTheme_my_account_page_id')));

    exit;
}

//---------------------------------

$current_user = wp_get_current_user();
$uid = $current_user->ID;

$post_p = get_post($pid);

if($post_p->post_author != $uid) { echo 'ERR. Not your project.'; exit;}


if(isset($_POST['yes'])) {
    $tm = current_time('timestamp',0);
    update_post_meta($pid, 'closed','1');
    update_post_meta($pid, 'closed_date',$tm);
    update_post_meta($pid, 'paid','1');
    update_post_meta($pid, 'outstanding',	'1');
    update_post_meta($pid, 'delivered',		'0');

    update_post_meta($pid, 'mark_coder_delivered',		'0');
    update_post_meta($pid, 'mark_seller_accepted',		'0');

    $expected_delivery = ($bid->days_done * 3600 * 24) + current_time('timestamp',0);
    update_post_meta($pid, 'expected_delivery',		$expected_delivery);

    //------------------------------------------------------------------------------

    $uid = $bid->uid;

    projectTheme_prepare_rating($pid, $bid->uid, $post_p->post_author);
    projectTheme_prepare_rating($pid, $post_p->post_author, $bid->uid);

    do_action('ProjectTheme_do_action_on_choose_winner', $bid->id );

    $newtm = current_time('timestamp');
    $query = "update ".$wpdb->prefix."project_bids set date_choosen='$newtm', winner='1' where id='{$bid->id}'";
    $wpdb->query($query);


    ProjectTheme_send_email_on_win_to_bidder($pid, $uid);
    ProjectTheme_send_email_on_win_to_owner($pid, $uid);


    global $wpdb;
    $s = "select distinct uid from ".$wpdb->prefix."project_bids where uid!='$uid' and pid='$pid'";
    $r = $wpdb->get_results($s);

    foreach($r as $row) {
        $looser = $row->uid;
        ProjectTheme_send_email_on_win_to_loser($pid, $looser);
    }
    // creating workspace

    $my_post = array( 'post_title'    => sprintf(__('Workspace for project #%s', 'ProjectTheme'),  $pid),
        'post_status'   => 'publish',
        'post_author'   => $post_p->post_author,
        'parent' => $pid,
        'post_type'   => 'workspace' 
    );

    // Insert the post into the database
    $nvp = wp_insert_post( $my_post );



    update_post_meta($nvp, 'freelancer' , $bid->uid); //->uid);
    update_post_meta($nvp, 'customer' , $current_user->ID); //->uid);
    update_post_meta($nvp, 'project' , $pid);

    //------------------

    update_post_meta($pid, 'winner', $uid);
    update_post_meta($pid, 'paid_user',"0");
    do_action('ProjectTheme_choose_winner',$pid);

    $projectTheme_enable_paypal_ad = get_option('projectTheme_enable_paypal_ad');
    if($projectTheme_enable_paypal_ad == "yes") {
        wp_redirect(get_permalink(get_option('ProjectTheme_my_account_awaiting_completion_id')));	exit;
    }

    wp_redirect(get_permalink(get_option('ProjectTheme_my_account_page_id')));
    //wp_redirect(ProjectTheme_get_payments_page_url2('escrow', $pid)); //get_permalink(get_option('ProjectTheme_my_account_page_id')));
    exit;
}

if(isset($_POST['no'])) {
    wp_redirect(get_permalink($pid));
    exit;
}

//==========================

get_header();

?>

<div id="main_wrapper">
    <div id="main" class="wrapper">
        <div class="padd10">
            <div class="confirmation_page">
            	<div class="padd10">
                    <div class="box_content">
                        <?php
                            printf(__("<h4>You are about to choose a winner for your project: %s</h4>",'ProjectTheme'), $post_p->post_title);
                        ?>
                        <div class="clear10"></div>

                        <form method="post" enctype="application/x-www-form-urlencoded">
                            <input type="submit" name="yes" value="<?php _e("Yes, Assign",'ProjectTheme'); ?>" class="submit_bottom"/>
                            <input type="submit" name="no"  value="<?php _e("No",'ProjectTheme'); ?>" class="submit_bottom"/>
                        </form>
                    </div>
			    </div>
			</div>
            <div class="clear100"></div>
        </div>
    </div>
</div>

<?php

get_footer();

?>
