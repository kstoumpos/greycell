<?php
if(!is_user_logged_in()) { wp_redirect(home_url()."/wp-login.php"); exit; }
//-----------

	add_filter('sitemile_before_footer', 'projectTheme_my_account_before_footer');
	function projectTheme_my_account_before_footer()
	{
		echo '<div class="clear10"></div>';		
	}
	
	//----------

	global $wpdb,$wp_rewrite,$wp_query;
	$pid = $wp_query->query_vars['pid'];

	global $current_user;
	$current_user=wp_get_current_user();
	$uid = $current_user->ID;

	$post_pr = get_post($pid);
	
	//---------------------------
	
	$winner_bd = projectTheme_get_winner_bid($pid);
	if($uid != $winner_bd->uid) { wp_redirect(home_url()); exit; }
	
	//---------------------------
	
	if(isset($_POST['yes']))
	{
		$tm = current_time('timestamp',0);
		
		$mark_coder_delivered = get_post_meta($pid, 'mark_coder_delivered', true);
		
		if(empty($mark_coder_delivered))
		{
		
			update_post_meta($pid, 'mark_coder_delivered',		"1");
			update_post_meta($pid, 'mark_coder_delivered_date',		$tm);
			
			//------------------------------------------------------------------------------
			
			ProjectTheme_send_email_on_delivered_project_to_bidder($pid, $uid);
			ProjectTheme_send_email_on_delivered_project_to_owner($pid);
		
		}
		
		wp_redirect(get_permalink(get_option('ProjectTheme_my_account_page_id')));
		exit;
	}
	
	if(isset($_POST['no']))
	{
		wp_redirect(get_permalink(get_option('ProjectTheme_my_account_outstanding_projects_id')));
		exit;			
	}
	
	
	
	//---------------------------------
	
	get_header();

?>
<!-- <div class="page_heading_me">
    <div class="page_heading_me_inner">
        <div class="main-pg-title">
            <div class="mm_inn"> <?php  //printf(__("Mark the project delivered: %s",'ProjectTheme'), $post_pr->post_title); ?></div>
            
        </div>            
    </div>
</div>  -->
<!-- ########## -->

<div id="main_wrapper">
    <div id="main" class="wrapper">
        <div class="padd10">
            <div class="confirmation_page">
                <div class="padd10">
                    <div class="box_content">   
                        <?php
                            printf(__("<h4>You are about to mark this project as delivered: %s</h4>",'ProjectTheme'), $post_pr->post_title); echo '<br/>';
                            _e("<h5>The project owner will be notified to accept the delivery and get you paid.</h5>",'ProjectTheme') ;
                        ?> 
                        <div class="clear10"></div>
            
                        <form method="post"> 
                            <input class="submit_bottom" type="submit" name="yes" value="<?php _e("Mark Delivered",'ProjectTheme'); ?>" />
                            <input class="submit_bottom" type="submit" name="no"  value="<?php _e("No",'ProjectTheme'); ?>" />   
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