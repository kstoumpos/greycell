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

 	session_start();
	global $current_user, $wp_query;
	$pid 	=  $wp_query->query_vars['pid'];

	function ProjectTheme_filter_ttl($title){return __("Delete Project",'ProjectTheme')." - ";}
	add_filter( 'wp_title', 'ProjectTheme_filter_ttl', 10, 3 );

	if(!is_user_logged_in()) { wp_redirect(home_url()."/wp-login.php"); exit; }

	$current_user = wp_get_current_user();


	$post = get_post($pid);

	$uid 	= $current_user->ID;
	$title 	= $post->post_title;
	$cid 	= $current_user->ID;

	$winner = get_post_meta($pid, 'winner', true);
  $wkpid = $_GET['pid'];
  $project = get_post_meta($wkpid,'project',true);

//-------------------------------------

	get_header();
?>

                <div class="page_heading_me">
                        <div class="page_heading_me_inner"> <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                            <div class="mm_inn"><?php printf(__("Project Workspace - #%s", "ProjectTheme"), $pid); ?>  </div>


                        </div>  </div>

                    </div>
<!-- ########## -->

<div id="main_wrapper">
		<div id="main" class="wrapper">

	<div class="account-main-area col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <div class="my_box3">
            	<div class="padd10">


                <div class="box_content">
                  <?php


                  $pst = get_post($project);


                  $owner 		= get_userdata($pst->post_author);

                  $projectTheme_get_winner_bid = projectTheme_get_winner_bid($project);
                  $bidder 	= get_userdata($projectTheme_get_winner_bid->uid);

                   ?>

                    <?php printf(__('Project: <a href="%s"><b>%s</b></a>','ProjectTheme'), get_the_permalink($project), $pst->post_title); ?> <br/>
                    <?php printf(__('Project owner: <a href="%s">%s</a>','ProjectTheme'), ProjectTheme_get_user_profile_link($owner->ID) ,$owner->user_login); ?> <br/>
                    <?php printf(__('Project bidder: <a href="%s">%s</a>','ProjectTheme'), ProjectTheme_get_user_profile_link($bidder->ID),  $bidder->user_login); ?> <br/>
                    <?php printf(__('Winning Bid Amount: %s','ProjectTheme'), projecttheme_get_show_price($projectTheme_get_winner_bid->bid)); ?> <br/>
                    <?php printf(__('Date work started: %s','ProjectTheme'), date_i18n('d-M-Y', get_post_meta($project,'closed_date',true) )); ?>

                </div>
                </div>
                </div>


                <!-- ########################### -->
                <?php

                $current_user = wp_get_current_user();

                if(isset($_POST['send_chat_mes']))
                {
                  $x1 = nl2br($_POST['text_message']);
                    $cont = strip_tags($x1,'<br>');
                        $wkid = $_POST['wkid'];
                            $tm = $_POST['tm'];



                            global $wpdb;
                            $s = "select id from ".$wpdb->prefix."project_workspace_pm where workspace_id='$wkid' and datemade='$tm'";
                            $r = $wpdb->get_results($s);



                            if(count($r) == 0)
                            {
                                if($current_user->ID == $pst->post_author) $ud_snd_to = $projectTheme_get_winner_bid->uid;
                                else $ud_snd_to = $pst->post_author;


                                $s = "insert into ".$wpdb->prefix."project_workspace_pm (workspace_id, pid, datemade, owner, user, content) values('$wkid', '$project','$tm','{$current_user->ID}','$ud_snd_to', '$cont')";
                                $wpdb->query($s);

                                //----------------------------------------

                                $s = "select id from ".$wpdb->prefix."project_workspace_pm where workspace_id='$wkid' and datemade='$tm'";
                                $r = $wpdb->get_results($s);
                                $row = $r[0];

                                $s = "insert into ".$wpdb->prefix."project_workspace_pm_reads (workspace_pm_id, receiver_user) values('{$row->id}','$ud_snd_to')";
                                $wpdb->query($s);

                                echo '<div class="saved_thing">'.__('Your chat message has been sent.','ProjectTheme')."</div>";
                            }
                }

##-------------------------------------------

                 ?>


                <div class="my_box3 zg_small_space_box"><div class="padd10 wk-cnt1">
                  <div class="dt_space"><?php echo date_i18n('d-M-Y H:i:s', get_post_meta($project,'closed_date',true) ) ?></div>

                                        <div class="avatar_icon"><img width="48" src="<?php echo get_template_directory_uri(); ?>/images/info_icon2.png" /></div>
                                        <div class="cnd_space"><?php _e('Work has started. Freelancer begins work on the project.','ProjectTheme') ?></div>

                </div></div>

                                <!-- ########################### -->

<?php
        global $wpdb;
        $s = "select * from ".$wpdb->prefix."project_workspace_pm where workspace_id='$wkpid' order by id asc";
        $r = $wpdb->get_results($s);

        if(count($r) > 0)
        {
            foreach($r as $row)
            {

              $msowner = get_userdata($row->owner);

if($row->user == $current_user->ID)
{
    $wpdb->query("update ".$wpdb->prefix."project_workspace_pm_reads set read_message='1' where workspace_pm_id='".$row->id."'");
}

                ?>


                                                <div class="my_box3 zg_small_space_box <?php if($row->owner == $current_user->ID) echo 'cl_001' ?>"><div class="padd10 wk-cnt1">
                                                  <div class="dt_space"><?php echo date_i18n('d-M-Y H:i:s', $row->datemade ) ?></div>

                                                                        <div class="avatar_icon"><img width="48" src="<?php echo ProjectTheme_get_avatar($row->owner,48, 48) ?>" class="avs-11" /><br/>
                                                                            <?php echo '<a href="'.ProjectTheme_get_user_profile_link($msowner->ID).'">'.$msowner->user_login.'</a>' ?>
                                                                        </div>
                                                                        <div class="cnd_space"><?php echo strip_tags($row->content,'<br>') ?></div>

                                                </div></div>



                <?php
            }
        }


 ?>

                                                <!-- ########################### -->




                                <?php $mark_coder_delivered = get_post_meta($project,'mark_coder_delivered',true);

                                      if($mark_coder_delivered == 1){
                                ?>

                                <div class="my_box3"><div class="padd10 wk-cnt1">
                                  <div class="dt_space"><?php echo date_i18n('d-M-Y H:i:s', get_post_meta($project,'mark_coder_delivered_date',true) ) ?></div>

                                                        <div class="avatar_icon"><img width="48" src="<?php echo get_template_directory_uri(); ?>/images/info_icon2.png" /></div>
                                                        <div class="cnd_space"><?php _e('Project has been completed by the freelancer. Waiting on the project owner to confirm the work.','ProjectTheme') ?></div>

                                </div></div>


                                <?php } ?>

                <!-- ########################### -->

                <?php $mark_seller_accepted = get_post_meta($project,'mark_seller_accepted',true);

                      if($mark_seller_accepted == 1){
                ?>

                <div class="my_box3"><div class="padd10 wk-cnt1">
                  <div class="dt_space"><?php echo date_i18n('d-M-Y H:i:s', get_post_meta($project,'mark_seller_accepted_date',true) ) ?></div>

                                        <div class="avatar_icon"><img width="48" src="<?php echo get_template_directory_uri(); ?>/images/info_icon2.png" /></div>
                                        <div class="cnd_space"><?php _e('Project is now ended. The work has been approved by the project owner.','ProjectTheme') ?></div>

                </div></div>


                <?php } ?>


                <!-- ########################### -->


                <div class="my_box3"><div class="padd10 wk-cnt1">
                    <form method="post"> <input name="tm" value="<?php echo current_time('timestamp',0) ?>" type="hidden" />
                      <input name="wkid" value="<?php echo $wkpid ?>" type="hidden" />
                  <textarea name="text_message" rows="" required cols="" class="txt-ar-chat do_input"></textarea>


                    <input type="submit" name="send_chat_mes" value="<?php _e('Send message','ProjectTheme') ?>" />

                </form>
                </div></div>


                </div>

	<?php ProjectTheme_get_users_links(); ?>


</div></div>

<?php get_footer(); ?>
