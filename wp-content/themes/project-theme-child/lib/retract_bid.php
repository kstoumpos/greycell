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


if(!is_user_logged_in()) { wp_redirect( home_url()."/wp-login.php"); exit; }
//-----------
	
global $current_user;
$current_user = wp_get_current_user();
$uid = $current_user->ID;
	
//----------

global $wpdb,$wp_rewrite,$wp_query;
$bid_id = $_GET['id'];

$s1 = "select * from ".$wpdb->prefix."project_bids where id='$bid_id'";
$r = $wpdb->get_results($s1);

if(count($r) == 0) die('error_bid_one_retract');	
if($r[0]->uid != $uid)  die('not yours to retract');

//---------------------------------

$pp = get_post($r[0]->pid);
$project_id = $r[0]->pid;	
	
if(isset($_POST['submit'])) {
	$sv_sv = $_POST['sv_sv'];
	if($sv_sv == "no") {
		wp_redirect(get_permalink($r[0]->pid));
		exit;	
	}
		
	if($sv_sv == "yes") {
		$s1 = "delete from ".$wpdb->prefix."project_bids where id='$bid_id'";
		$wpdb->query($s1);
		
		delete_post_meta($r[0]->pid,'bid', $uid);
		
		$s2 = "select * from ".$wpdb->prefix."posts where ID='$project_id'";
		$r2 = $wpdb->get_results($s2);

		$project_author = $r2[0]->post_author;

		//edw tha mpei h synarthsh gia to mail kai stous dyo
		ProjectTheme_send_email_on_rectract_bid_owner($r[0]->pid,$uid,$project_author);
		ProjectTheme_send_email_on_rectract_bid_bidder($r[0]->pid,$uid,$project_author);
			
		wp_redirect(get_permalink($r[0]->pid));

		exit;	
	}
	
	exit;	
}
	
	
//==========================

get_header();

?>
<div class="page_heading_me">
	<div class="page_heading_me_inner">
    <div class="main-pg-title">
    	<div class="mm_inn"><?php  printf(__("Retract your bid of %s to project %s",'ProjectTheme'), projecttheme_get_show_price($r[0]->bid),  $pp->post_title ); ?>
                     </div>
                    
 </div>


		<?php projectTheme_get_the_search_box() ?>            
                    
    </div>
</div>


<?php projecttheme_search_box_thing() ?>


 
<div id="main_wrapper">
		<div id="main" class="wrapper"> 
	
			<div class="my_box3">
            	<div class="padd10">
 
            
            	<div class="box_title"><?php  printf(__("Are you sure you want to retract your bid ?",'ProjectTheme')); ?></div>
                <div class="box_content">   
    
                
                <div class="clear10"></div>
               
               <form method="post" > 
                
               <input type="radio" class="do_input" name="sv_sv" id="user_tp" value="yes" checked="checked" /> <?php _e('Yes', 'ProjectTheme'); ?><br/>
               <input type="radio" class="do_input" name="sv_sv" id="user_tp" value="no" /> <?php _e('No, get back','ProjectTheme'); ?><br/>
                
                <br/>
                
                <input type="submit" class="submit_bottom" value="<?php _e('Submit your answer','ProjectTheme'); ?>" name="submit" />
                
               </form>
    </div>
			</div>
			</div>
        </div>  </div>
        
        
        <div class="clear100"></div>
            
            
<?php

get_footer();

?>                        