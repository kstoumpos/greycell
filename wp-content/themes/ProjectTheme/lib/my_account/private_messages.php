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


function ProjectTheme_my_account_private_messages_area_function(){
		global $current_user, $wpdb, $wp_query;
		
		$current_user = wp_get_current_user();
		$uid = $current_user->ID;
		$myuid = $uid;
?>

    <?php
        global $wpdb,$wp_rewrite,$wp_query;
        $third_page = $wp_query->query_vars['pg'];

        if(empty($third_page)) $third_page = 'home';
    ?>
        <div class="clear10"></div>
        <div class="account-main-area col-xs-12 col-sm-8 col-md-8 col-lg-8">

            <div class="my_box3">
                <div class="padd10">
                    <div class="clear10"></div>
                    <ul class="cms_cms">
                        <li><a href="<?php echo ProjectTheme_get_priv_mess_page_url(); ?>" class="green_btn"><?php _e("Messaging Home","ProjectTheme"); ?></a></li>
                        <li> <a href="<?php echo ProjectTheme_get_priv_mess_page_url('send'); ?>" class="green_btn"><?php _e("Send New Message","ProjectTheme"); ?></a></li>
                        <li><a href="<?php echo ProjectTheme_get_priv_mess_page_url('inbox'); ?>" class="green_btn"><?php _e("Inbox","ProjectTheme");

                        $rd = projectTheme_get_unread_number_messages($current_user->ID);
                        if($rd > 0) echo ' ('.$rd.')';

                        ?></a></li>
                        <li><a href="<?php echo ProjectTheme_get_priv_mess_page_url('sent-items'); ?>" class="green_btn"><?php _e("Sent Items","ProjectTheme"); ?></a></li>

                    </ul>

                </div>
            </div>
            <div class="clear10"></div>
            <?php

                if($third_page == 'home') {
                $myuid = $current_user->ID;

            ?>

		    <!-- page content here -->
            <div class="my_box3">
            	<div class="box_title"><?php _e("Latest Received Messages","ProjectTheme"); ?></div>
                <div class="box_content">
                    <?php
                    global $wpdb;
                    $uidsss = $current_user->ID;
                    $s = "select * from ".$wpdb->prefix."project_pm where (user='$uidsss')  AND show_to_destination='1' and parent='0' and approved='1'  order by id desc limit 4";
                    $r = $wpdb->get_results($s);

                    if(count($r) > 0)
                    {
                        echo '<table width="100%" class="da_table_done">';

                        echo '<tr>';
                            echo '<td>'.__('From User','ProjectTheme').'</td>';
                            echo '<td>'.__('Subject','ProjectTheme').'</td>';
                            echo '<td>'.__('Date','ProjectTheme').'</td>';
                            echo '<td>'.__('Options','ProjectTheme').'</td>';
                            echo '</tr>';



                        foreach($r as $row)
                        {
                            if($row->rd == 0) $cls = 'bold_stuff';
                            else $cls = '';

                            $user = get_userdata($row->initiator);
                            $s2 = "select * from ".$wpdb->prefix."project_pm where rd='0' and parent='{$row->id}' and user='$uidsss' ";
                            $r2 = $wpdb->get_results($s2);

                            if(count($r2) > 0 or $row->rd == 0) $bold = 'style="font-weight:bold"';
                            else $bold = '';
                            
                            
                            if($row->initiator == $current_user->ID) $user_nv = get_userdata($row->user);
                            else $user_nv = get_userdata($row->initiator);
                            

                            echo '<tr '.$bold.'>';
                            echo '<td class="'.$cls.'"><a href="'.home_url().'/?p_action=user_profile&post_author='.$user_nv->ID.'">'.$user_nv->user_login.'</a></td>';
                            echo '<td class="'.$cls.'">'.$row->subject.'</td>';
                            echo '<td class="'.$cls.'">'.date_i18n('d-M-Y H:i:s',$row->datemade).'</td>';
                            echo '<td><a href="'.ProjectTheme_get_priv_mess_page_url('read-message', $row->id).'" class="green_btn3">'.__('Reply','ProjectTheme').'</a> 
                            <a href="'.ProjectTheme_get_priv_mess_page_url('delete-message', $row->id).'" class="green_btn3">'.__('Delete','ProjectTheme').'</a></td>';
                            echo '</tr>';

                        }


                        echo '</table>';
                    } else _e('No messages here.','ProjectTheme');

                    ?>
                </div>
            </div>

            <!--#######-->

            <div class="clear10"></div>

            <div class="my_box3">
            	<div class="box_title"><?php _e("Latest Sent Items","ProjectTheme"); ?></div>
                <div class="box_content">
                    <?php
                    global $wpdb; $uidss = $current_user->ID;
                    $s = "select * from ".$wpdb->prefix."project_pm where (initiator='$uidss')  AND show_to_source='1' and parent='0' order by id desc limit 4";
                    $r = $wpdb->get_results($s);

                    if(count($r) > 0)
                    {
                        echo '<table width="100%" class="da_table_done">';

                        echo '<tr>';
                            echo '<td>'.__('To User','ProjectTheme').'</td>';
                            echo '<td>'.__('Subject','ProjectTheme').'</td>';
                            echo '<td>'.__('Date','ProjectTheme').'</td>';
                            echo '<td>'.__('Options','ProjectTheme').'</td>';
                            echo '</tr>';



                        foreach($r as $row)
                        {
                            //if($row->rd == 0) $cls = 'bold_stuff';
                            //else
                            $cls = '';

                            $user = get_userdata($row->user);

                            $s2 = "select * from ".$wpdb->prefix."project_pm where rd='0' and parent='{$row->id}' and user='$uidsss' ";
                            $r2 = $wpdb->get_results($s2);

                            if(count($r2) > 0) $bold = 'style="font-weight:bold"';
                            else $bold = '';
                            
                            if($row->initiator != $current_user->ID) $user_nv = get_userdata($row->initiator);
                            else $user_nv = get_userdata($row->user);


                            echo '<tr '.$bold.'>';
                            echo '<td class="'.$cls.'"><a href="'.ProjectTheme_get_user_profile_link($user_nv->ID).'">'.$user_nv->user_login.'</a></td>';
                            echo '<td class="'.$cls.'"><a href="'.ProjectTheme_get_priv_mess_page_url('read-message', $row->id).'">'.$row->subject.'</a></td>';
                            echo '<td class="'.$cls.'">'.date_i18n('d-M-Y H:i:s',$row->datemade).'</td>';
                            echo '<td><a href="'.ProjectTheme_get_priv_mess_page_url('read-message', $row->id).'" class="green_btn3">'.__('Reply','ProjectTheme').'</a>  
                            <a href="'.ProjectTheme_get_priv_mess_page_url('delete-message', $row->id).'" class="green_btn3">'.__('Delete','ProjectTheme').'</a></td>';
                            echo '</tr>';

                        }


                        echo '</table>';
                    }
                    else _e('No messages here.','ProjectTheme');
                    ?>
                </div>
            </div>


		<!-- page content here -->

        <?php }
			elseif($third_page == 'inbox') {
	 
			$myuid = $current_user->ID;
			//echo $myuid;
		?>

		<!-- page content here -->


        <div class="my_box3">
            <div class="box_title"><?php _e("Private Messages: Inbox","ProjectTheme"); ?></div>
            <div class="box_content">
                <?php

                global $wpdb;
                $page_rows = 20;
                $page_rows = apply_filters('ProjectTheme_nr_of_messages_priv_pagination', $page_rows);

                $pagenum 	= isset($_GET['pagenum']) ? $_GET['pagenum'] : 1;
                $max 		= ' limit ' .($pagenum - 1) * $page_rows .',' .$page_rows;

                $s 		= "select count(id) tots from ".$wpdb->prefix."project_pm where (initiator='$myuid' or user='$myuid') and parent='0' AND show_to_destination='1' and approved='1'";
                $r 		= $wpdb->get_results($s);
                $total 	= $r[0]->tots;

                $last = ceil($total/$page_rows);

                //-------------------------

                $s = "select * from ".$wpdb->prefix."project_pm where (initiator='$myuid' or user='$myuid') AND show_to_destination='1' and parent='0' and approved='1' order by id desc ". $max;
                $r = $wpdb->get_results($s);



                if(count($r) > 0)
                {
                    ?>

                    <script>

                    $(document).ready(function() {
                        //set initial state.


                        $('#select_all_stuff').change(function() {
                            if($(this).is(":checked")) {

                                $('.message_select_bx').attr("checked", true);
                            }
                            else
                            {
                                $('.message_select_bx').attr("checked", false);
                            }
                        });
                    });


                    </script>

                    <?php

                    echo '<form method="post" action="'.ProjectTheme_get_priv_mess_page_url('delete-message','','&return=inbox').'">';
                    echo '<table class="da_table_done" width="100%">';

                    echo '<tr>';
                        echo '<td><input type="checkbox" name="" id="select_all_stuff" value="1" /> '.__('Select All','ProjectTheme').' </td>';
                        echo '<td>'.__('From User','ProjectTheme').'</td>';
                        echo '<td>'.__('Subject','ProjectTheme').'</td>';
                        echo '<td>'.__('Date','ProjectTheme').'</td>';
                        echo '<td>'.__('Options','ProjectTheme').'</td>';
                        echo '</tr>';



                    foreach($r as $row)
                    {
                        //if($row->rd == 0) $cls = 'bold_stuff';
                        //else $cls = '';

                        $user = get_userdata($row->initiator);

                        $s2 = "select * from ".$wpdb->prefix."project_pm where rd='0' and parent='{$row->id}' and user='$uidsss' ";
                        $r2 = $wpdb->get_results($s2);

                        if(count($r2) > 0 or $row->rd == 0) $bold = 'style="font-weight:bold"';
                        else $bold = '';
                        
                        if($row->initiator == $current_user->ID) $user_nv = get_userdata($row->user);
                        else $user_nv = get_userdata($row->initiator);

                        echo '<tr '.$bold.'>';
                        echo '<td><input type="checkbox" class="message_select_bx" name="message_ids[]" value="'.$row->id.'" /></td>';
                        echo '<td class="'.$cls.'"><a href="'.home_url().'/?p_action=user_profile&post_author='.$user_nv->ID.'">'.$user_nv->user_login.'</a></td>';
                        echo '<td class="'.$cls.'"><a href="'.ProjectTheme_get_priv_mess_page_url('read-message', $row->id).'">'.substr($row->subject,0,30).'</a></td>';
                        echo '<td class="'.$cls.'">'.date_i18n('d-M-Y H:i:s',$row->datemade).'</td>';
                        echo '<td><a href="'.ProjectTheme_get_priv_mess_page_url('read-message', $row->id).'" class="green_btn3">'.__('Reply','ProjectTheme').'</a> 
                        <a href="'.ProjectTheme_get_priv_mess_page_url('delete-message', $row->id).'" class="green_btn3">'.__('Delete','ProjectTheme').'</a></td>';
                        echo '</tr>';

                    }

                    echo '<tr><td colspan="5"><input type="submit" value="'.__('Delete Selected','ProjectTheme').'" name="delete_sel" /></td></tr>';
                    echo '<tr><td colspan="5">  ';

                            echo ProjectTheme_get_my_pagination_main(home_url(). "/?page_id=".get_option('ProjectTheme_my_account_private_messages_id'),
                            $pagenum, 'pagenum', $last, '&pg=inbox');

                    echo ' </td></tr>';



                    echo '</table></form>';
                } else _e('No messages here.','ProjectTheme');

                ?>


            </div>
        </div>


		<!-- page content here -->

        <?php }

		elseif($third_page == 'sent-items') {
			$myuid = $current_user->ID;
		?>
        <script>
            $(document).ready(function() {
                //set initial state.
                $('#select_all_stuff').change(function() {
                    if($(this).is(":checked")) {

                        $('.message_select_bx').attr("checked", true);
                    }
                    else
                    {
                        $('.message_select_bx').attr("checked", false);
                    }
                });
            });
        </script>
		<!-- page content here -->


        <div class="my_box3">
            <div class="box_title"><?php _e("Private Messages: Sent Items","ProjectTheme"); ?></div>
                <div class="box_content">
                <?php
                global $wpdb;

                $page_rows = 20;
                $page_rows = apply_filters('ProjectTheme_nr_of_messages_priv_pagination', $page_rows);

                $pagenum 	= isset($_GET['pagenum']) ? $_GET['pagenum'] : 1;
                $max 		= ' limit ' .($pagenum - 1) * $page_rows .',' .$page_rows;

                //---------------------------------

                $s 		= "select count(id) tots from ".$wpdb->prefix."project_pm where (initiator='$myuid' or user='$myuid') AND show_to_source='1' and parent='0' and approved='1'";
                $r 		= $wpdb->get_results($s);
                $total 	= $r[0]->tots;

                $last = ceil($total/$page_rows);

                //---------------------------------

                $s = "select * from ".$wpdb->prefix."project_pm where (initiator='$myuid' or user='$myuid') AND show_to_source='1' and approved='1' and parent='0' order by id desc ".$max;
                $r = $wpdb->get_results($s);

                if(count($r) > 0)
                {

                    echo '<form method="post" action="'.ProjectTheme_get_priv_mess_page_url('delete-message','','&return=outbox').'">';
                    echo '<table class="da_table_done" width="100%">';

                    echo '<tr>';
                        echo '<td><input type="checkbox" name="" id="select_all_stuff" value="1" /> '.__('Select All','ProjectTheme').' </td>';
                        echo '<td>'.__('To User','ProjectTheme').'</td>';
                        echo '<td>'.__('Subject','ProjectTheme').'</td>';
                        echo '<td>'.__('Date','ProjectTheme').'</td>';
                        echo '<td>'.__('Options','ProjectTheme').'</td>';
                        echo '</tr>';



                    foreach($r as $row)
                    {
                        //if($row->rd == 0) $cls = 'bold_stuff';
                        //else
                        $cls = '';

                        $user = get_userdata($row->user);
                        
                        if($row->initiator != $current_user->ID) $user_nv = get_userdata($row->initiator);
                        else $user_nv = get_userdata($row->user);

                        echo '<tr>';
                        echo '<td><input type="checkbox" class="message_select_bx" name="message_ids[]" value="'.$row->id.'" /></td>';
                        echo '<td class="'.$cls.'"><a href="'.ProjectTheme_get_user_profile_link($user_nv->user).'">'.$user_nv->user_login.'</a></td>';
                        echo '<td class="'.$cls.'"><a href="'.ProjectTheme_get_priv_mess_page_url('read-message', $row->id).'">'.substr($row->subject,0,30).'</a></td>';
                        echo '<td class="'.$cls.'">'.date_i18n('d-M-Y H:i:s',$row->datemade).'</td>';
                        echo '<td><a  class="green_btn3" href="'.ProjectTheme_get_priv_mess_page_url('read-message', $row->id).'">'.__('Reply','ProjectTheme').'</a>  
                        <a href="'.ProjectTheme_get_priv_mess_page_url('delete-message', $row->id).'"  class="green_btn3">'.__('Delete','ProjectTheme').'</a></td>';
                        echo '</tr>';

                    }

                    echo '<tr><td colspan="5"><input type="submit" value="'.__('Delete Selected','ProjectTheme').'" name="delete_sel" /></td></tr>';
                    echo '<tr><td colspan="5">  ';

                        echo ProjectTheme_get_my_pagination_main(home_url(). "/?page_id=".get_option('ProjectTheme_my_account_private_messages_id'),
                            $pagenum, 'pagenum', $last, '&pg=sent-items');


                    echo ' </td></tr>';

                    echo '</table></form>';
                }
                else _e('No messages here.','ProjectTheme');
                ?>
            </div>
        </div>



		<!-- page content here -->

        <?php }


		elseif($third_page == 'delete-message') {
			$id = $_GET['id'];
			$s = "select * from ".$wpdb->prefix."project_pm where id='$id' AND (user='$myuid' OR initiator='$myuid')";
			$r = $wpdb->get_results($s);
			$row = $r[0];

		 
			$myuid = $current_user->ID;


			if($myuid == $row->initiator) $owner = true; else $owner = false;

			//if(!$owner)
			//$wpdb->query("update_i18n ".$wpdb->prefix."auction_pm set rd='1' where id='{$row->id}'");
		?>

		<!-- page content here -->


            	<div class="my_box3">
            	<div class="padd10">

            	<div class="box_title"><?php

				if(isset($_POST['delete_sel']))
				{
					_e("Delete Multiple Messages: ","ProjectTheme");

				}
				else
				{
					_e("Delete Message: ","ProjectTheme");
					echo " ".htmlentities($row->subject);
				}

				 ?></div>
                <div class="box_content">

                <?php
					if(isset($_POST['message_ids']))
					{
						$message_ids2 = $_POST['message_ids'];
						foreach($message_ids2 as $message_id)
						{
							$ss1 = "select * from ".$wpdb->prefix."project_pm where id='$message_id'";
							$rr1 = $wpdb->get_results($ss1);
							$rrow1 = $rr1[0];
							echo '#'.$rrow1->id." ".$rrow1->subject.'<br/>';

						} echo '<br/>';
					}
				?>

                <?php //echo $row->content; ?>
      <br/> <br/>

      <?php if(1): //$owner == false):

	  	if(isset($_POST['delete_sel'])):

			$message_ids = $_POST['message_ids'];
			if(count($message_ids) == 0)
			{
				_e("No messsages selected.","ProjectTheme");
			}
			else
			{
				$attash = '';
				foreach($message_ids as $message_id)
				{
					$attash .= '&message_id[]='.$message_id;
				}

				?>

                   <a href="<?php echo ($_GET['rdr']); ?>" class="nice_link"><?php _e("Cancel",'ProjectTheme'); ?></a>

                    <a href="<?php echo ProjectTheme_get_priv_mess_page_url('delete-message', '', '&confirm_message_deletion=yes&return='.urlencode($_GET['rdr'])).$attash; ?>"
       				class="nice_link"><?php _e("Confirm Deletion",'ProjectTheme'); ?></a>

                <?php
			}

		else:

	  ?>

      <a href="<?php echo (htmlentities($_GET['rdr'])); ?>" class="nice_link"><?php _e("Cancel",'ProjectTheme'); ?></a>

       <a href="<?php echo ProjectTheme_get_priv_mess_page_url('delete-message', $row->id, '&confirm_message_deletion=yes&return='.urlencode($_GET['rdr'])); ?>"
       class="nice_link"><?php _e("Confirm Deletion",'ProjectTheme'); ?></a> <?php endif; endif; ?>
                </div>
                </div>
                </div>


		<!-- page content here -->

        <?php }


		elseif($third_page == 'read-message') {

			global $current_user, $wpdb;
			$current_user = wp_get_current_user(); //get_currentuserinfo();
			$myuid = $current_user->ID;

			$id = projecttheme_sanitize_string($_GET['id']);
			$s = "select * from ".$wpdb->prefix."project_pm where id='$id'  AND (user='$myuid' OR initiator='$myuid')";
			$r = $wpdb->get_results($s);
			$row = $r[0];

			if($myuid == $row->initiator) $owner = true; else $owner = false;

			if(!$owner)
			$wpdb->query("update ".$wpdb->prefix."project_pm set rd='1' where id='{$row->id}'");


		?>

		<!-- page content here -->


            	<div class="my_box3">
            	<div class="box_title"><?php _e("Read Message: ","ProjectTheme"); echo " ".htmlentities($row->subject) ?></div>
							</div>


							<?php

                                    if(isset($_POST['send_a']))
                                    {

                                        require_once(ABSPATH . "wp-admin" . '/includes/file.php');
                                        require_once(ABSPATH . "wp-admin" . '/includes/image.php');


                                        if(!empty($_FILES['file_instant']['name'])):

                                            $pids = 0;
                                            $upload_overrides 	= array( 'test_form' => false );
                                            $uploaded_file 		= wp_handle_upload($_FILES['file_instant'], $upload_overrides);

                                            $file_name_and_location = $uploaded_file['file'];
                                            $file_title_for_media_library = $_FILES['file_instant']['name'];

                                            $arr_file_type 		= wp_check_filetype(basename($_FILES['file_instant']['name']));
                                            $uploaded_file_type = $arr_file_type['type'];



                                            if($uploaded_file_type == "application/zip" or $uploaded_file_type == "application/pdf" or $uploaded_file_type == "application/msword" or $uploaded_file_type == "application/msexcel" or
                                            $uploaded_file_type == "application/doc" or $uploaded_file_type == "application/docx" or
                                            $uploaded_file_type == "application/xls" or $uploaded_file_type == "application/xlsx" or $uploaded_file_type == "application/csv" or $uploaded_file_type == "application/ppt" or
                                            $uploaded_file_type == "application/pptx" or $uploaded_file_type == "application/vnd.ms-excel"
                                            or $uploaded_file_type == "application/vnd.ms-powerpoint" or $uploaded_file_type == "application/vnd.openxmlformats-officedocument.presentationml.presentation"

                                            or $uploaded_file_type == "application/octet-stream"
                                            or $uploaded_file_type == "image/png"
                                            or $uploaded_file_type == "image/jpg"  or $uploaded_file_type == "image/jpeg"

                                                or $uploaded_file_type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
                                                or $uploaded_file_type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"  )
                                            {



                                                $attachment = array(
                                                                'post_mime_type' => $uploaded_file_type,
                                                                'post_title' => addslashes($file_title_for_media_library),
                                                                'post_content' => '',
                                                                'post_status' => 'inherit',
                                                                'post_parent' =>  0,

                                                                'post_author' => $uid,
                                                            );

                                                $attach_id 		= wp_insert_attachment( $attachment, $file_name_and_location, $pids );
                                                $attach_data 	= wp_generate_attachment_metadata( $attach_id, $file_name_and_location );
                                                wp_update_attachment_metadata($attach_id,  $attach_data);




                                            } else $error_mm = '1';

                                        endif;



                                        $message 	= projecttheme_sanitize_string($_POST['message_a']);
                                        $uids 		=  ($_POST['send_to']);

                                        if(strlen($message) < 2) $error_mm = 1;

                                        if($uids != false and $error_mm != "1"):

                                        //echo $message;
                                        //*********************************************

                                        $ProjectTheme_moderate_private_messages = get_option('ProjectTheme_moderate_private_messages');
                                        if($ProjectTheme_moderate_private_messages == "yes") $ProjectTheme_moderate_private_messages = true;
                                        else $ProjectTheme_moderate_private_messages = false;

                                        //--------------------------

                                        if($ProjectTheme_moderate_private_messages == true)
                                        {
                                            $approved = '0';
                                            $show_to_destination = '0';
                                        }
                                        else
                                        {
                                            $approved = '1';
                                            $show_to_destination = '1';
                                        }

                                        //*********************************************

                                        $current_user = wp_get_current_user();

                                        global $wpdb;
                                        $tm = projecttheme_sanitize_string($_POST['tm']); //current_time('timestamp',0);
                                        $myuid = $current_user->ID;

                                        $sr = "select * from ".$wpdb->prefix."project_pm where initiator='$myuid' and user='$uids' and datemade='$tm'";
                                        $rr = $wpdb->get_results($sr);

                                        if(count($rr) == 0)
                                        {

                                            if(empty($pid)) $pid = 0;
                                            $parent = $_POST['parent'];

                                            $s = "insert into ".$wpdb->prefix."project_pm
                                            (approved, subject, content, datemade, pid, initiator, user, file_attached, show_to_destination, parent)
                                            values('$approved','$subject','$message','$tm','$pid','$myuid','$uids', '$attach_id', '$show_to_destination','$parent')";

                                            $wpdb->query($s);


                                            //------------------------------

                                            if($ProjectTheme_moderate_private_messages == false)
                                                ProjectTheme_send_email_on_priv_mess_received($myuid, $uids);
                                            else
                                            {
                                                //send message to admin to moderate

                                            }


                                        }

                                    //-----------------------
                                        ?>

                                                        <div class="my_box3">
                                                    <div class="padd10">
                                                            <?php

                                            if($ProjectTheme_moderate_private_messages == false)
                                            _e('Your message has been sent.','ProjectTheme');
                                            else
                                                _e('Your message has been sent but the receiver will receive it only after moderation.','ProjectTheme')

                                            ?>
                                                        </div>
                                                        </div>

                                                        <?php

                                        else:

                                            if($error_mm == "1") {

                                                if(strlen($message) < 2) echo '<div class="error">'.__('You need to type in a message.','ProjectTheme') . '</div>';
                                                else echo '<div class="error">'. sprintf(__('Wrong File format: %s','ProjectTheme'), $uploaded_file_type) . '</div>';

                                            }

                                        endif;


                                    }

																	 ?>


							<div class="clear5"></div>
							<?php

							if($row->initiator  == $current_user->ID) $class1 = 'my_bk1_class';
							else $class1 = '';

								?>

							<div class="my_box3 mgr_btm <?php echo $class1 ?>">
                <div class="box_content">
										<div class="threaded-message-user">
												<img width="70" class="avatar_good_1" height="70" border="0" src="<?php echo ProjectTheme_get_avatar($row->initiator,70,70); ?>" /> <br/>
												<?php
															echo date_i18n('d-M-Y H:i:s', $row->datemade). '<br/>';
															$user_se = get_userdata($row->initiator);
															echo '<a href="'.ProjectTheme_get_user_profile_link($user_se->ID).'">' . $user_se->user_login . '</a>';
												 ?>
										</div>

								<div class="threaded-message-content">
                <?php echo stripslashes($row->content); ?>
      <br/> <br/>

      <?php

	  	if(!empty($row->file_attached))
		echo sprintf(__('File Attached: %s','ProjectTheme') , '<a href="'.wp_get_attachment_url($row->file_attached).'">'.wp_get_attachment_url($row->file_attached)."</a>") ;

	  ?>



                </div></div>
                </div>
								<?php

										$current_user = wp_get_current_user();

										$s = "select * from ".$wpdb->prefix."project_pm where parent='{$row->id}' order by id asc";
										$r = $wpdb->get_results($s);

										if(count($r) > 0)
										foreach($r as $row1)
										{
													if($row1->user == $current_user->ID)
													{
															$wpdb->query("update ".$wpdb->prefix."project_pm set rd='1' where id='{$row1->id}'");

													}


													if($row1->initiator  == $current_user->ID) $class1 = 'my_bk1_class';
													else $class1 = '';


												?>
														<div class="clear5"></div>

														<div class="my_box3 mgr_btm <?php echo $class1.' ' ?>">
															<div class="box_content">
																	<div class="threaded-message-user">
																			<img width="70" class="avatar_good_1" height="70" border="0" src="<?php echo ProjectTheme_get_avatar($row1->initiator,70,70); ?>" /> <br/>
																			<?php
																						echo date_i18n('d-M-Y H:i:s', $row1->datemade). '<br/>';
																						$user_se = get_userdata($row1->initiator);
																						echo '<a href="'.ProjectTheme_get_user_profile_link($user_se->ID).'">' . $user_se->user_login.'</a>';
																			 ?>
																	</div>

															<div class="threaded-message-content">
															<?php echo stripslashes($row1->content); ?>
														<br/> <br/>

														<?php

														if(!empty($row1->file_attached))
														echo sprintf(__('File Attached: %s','ProjectTheme') , '<a href="'.wp_get_attachment_url($row1->file_attached).'">'.wp_get_attachment_url($row1->file_attached)."</a>") ;

														?>



															</div></div>
															</div>

												<?php
										}




								 ?>

								<div class="my_box3">
	                <div class="box_content">


										<form method="post" enctype="multipart/form-data" action="<?php echo  (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
											<input name="send_to" type="hidden" value="<?php echo $row->user; ?>" />
												<input name="parent" type="hidden" value="<?php echo $row->id; ?>" />

										<input type="hidden" name="tm" value="<?php echo current_time('timestamp',0); ?>" />
										<table>


										 <script>

					jQuery(document).ready(function(){
					tinyMCE.init({
							mode : "specific_textareas",
							theme : "modern",
							/*plugins : "autolink, lists, spellchecker, style, layer, table, advhr, advimage, advlink, emotions, iespell, inlinepopups, insertdatetime, preview, media, searchreplace, print, contextmenu, paste, directionality, fullscreen, noneditable, visualchars, nonbreaking, xhtmlxtras, template",*/
							editor_selector :"tinymce-enabled"
						});
					});

					</script>

										<tr>
										<td valign="top"><?php _e("Message", "ProjectTheme"); ?>:</td>
										<td><textarea name="message_a" class="tinymce-enabled" rows="6" cols="50"></textarea></td>
										</tr>


										<tr>
										<td valign="top"><?php _e("Attach File", "ProjectTheme"); ?>:</td>
										<td><input type="file" name="file_instant" class="" /> <?php _e('Only PDF, ZIP, Office files and Images.','ProjectTheme'); ?></td>
										</tr>


										 <tr>
										<td width="140">&nbsp;</td>
										<td></td>
										</tr>

										 <tr>
										<td width="140">&nbsp;</td>
										<td><input name="send_a" class="submit_bottom2" type="submit" value="<?php _e("Send Message",'ProjectTheme'); ?>" /></td>
										</tr>

										</table>
								</form>

									</div></div>


		<!-- page content here -->

        <?php }
		 elseif($third_page == 'send') { ?>
        <?php

			$pid = projecttheme_sanitize_string($_GET['pid']);
			$uid = projecttheme_sanitize_string($_GET['uid']);

			$user = get_userdata($uid);

			if(!empty($pid))
			{
				$post = get_post($pid);
				$subject = "RE: ".$post->post_title;
			}
			elseif(!empty($_GET['in_reply_to']))
			{
				global $wpdb;
				$ssp = "select * from ".$wpdb->prefix."project_pm where id='".projecttheme_sanitize_string($_GET['in_reply_to'])."'";
				$sspq = $wpdb->get_results($ssp);

				if (strpos($sspq[0]->subject ,'RE:') !== false) { $subject = $sspq[0]->subject; }
				else
				$subject = "RE: ".$sspq[0]->subject;
			}


			if(isset($_POST['send_a']))
			{

				require_once(ABSPATH . "wp-admin" . '/includes/file.php');
				require_once(ABSPATH . "wp-admin" . '/includes/image.php');


				if(!empty($_FILES['file_instant']['name'])):

					$pids = 0;
					$upload_overrides 	= array( 'test_form' => false );
					$uploaded_file 		= wp_handle_upload($_FILES['file_instant'], $upload_overrides);

					$file_name_and_location = $uploaded_file['file'];
					$file_title_for_media_library = $_FILES['file_instant']['name'];

					$arr_file_type 		= wp_check_filetype(basename($_FILES['file_instant']['name']));
					$uploaded_file_type = $arr_file_type['type'];



					if($uploaded_file_type == "application/zip" or $uploaded_file_type == "application/pdf" or $uploaded_file_type == "application/msword" or $uploaded_file_type == "application/msexcel" or
					$uploaded_file_type == "application/doc" or $uploaded_file_type == "application/docx" or
					$uploaded_file_type == "application/xls" or $uploaded_file_type == "application/xlsx" or $uploaded_file_type == "application/csv" or $uploaded_file_type == "application/ppt" or
					$uploaded_file_type == "application/pptx" or $uploaded_file_type == "application/vnd.ms-excel"
					or $uploaded_file_type == "application/vnd.ms-powerpoint" or $uploaded_file_type == "application/vnd.openxmlformats-officedocument.presentationml.presentation"

					or $uploaded_file_type == "application/octet-stream"
					or $uploaded_file_type == "image/png"
					or $uploaded_file_type == "image/jpg"  or $uploaded_file_type == "image/jpeg"

					  or $uploaded_file_type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
					  or $uploaded_file_type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"  )
					{



						$attachment = array(
										'post_mime_type' => $uploaded_file_type,
										'post_title' => addslashes($file_title_for_media_library),
										'post_content' => '',
										'post_status' => 'inherit',
										'post_parent' =>  0,

										'post_author' => $uid,
									);

						$attach_id 		= wp_insert_attachment( $attachment, $file_name_and_location, $pids );
						$attach_data 	= wp_generate_attachment_metadata( $attach_id, $file_name_and_location );
						wp_update_attachment_metadata($attach_id,  $attach_data);




					} else $error_mm = '1';

				endif;


				$subject 	= projecttheme_sanitize_string($_POST['subject_a']);
				$message 	= projecttheme_sanitize_string($_POST['message_a']);
				$uids 		= projecttheme_sanitize_string($_POST['to_a']);



				if(isset($_POST['projectss'])):
					if(!empty($_POST['projectss'])):
						$uids = $_POST['projectss'];
					endif;
				endif;



				if(!empty($_POST['to_as']))
				{
		 

					$uids = projectTheme_get_userid_from_username(projecttheme_sanitize_string($_POST['to_as']));


					if($uids == $current_user->ID) { $uids = false; $error_mm = 1; $cant_send = 1; }
				}

				if(empty($uids))
				{
					$uids =projecttheme_sanitize_string( $_GET['uid'] );

				}
                
           
				$myuid = $current_user->ID;

				if($uids == $current_user->ID) { $uids = false; $error_mm = 1; $cant_send = 1; }
                

				if($uids != false and $error_mm != "1"):

		 
				$myuid = $current_user->ID;

				//echo $message;
				//*********************************************

				$ProjectTheme_moderate_private_messages = get_option('ProjectTheme_moderate_private_messages');
				if($ProjectTheme_moderate_private_messages == "yes") $ProjectTheme_moderate_private_messages = true;
				else $ProjectTheme_moderate_private_messages = false;

				//--------------------------

				if($ProjectTheme_moderate_private_messages == true)
				{
					$approved = '0';
					$show_to_destination = '0';
				}
				else
				{
					$approved = '1';
					$show_to_destination = '1';
				}

				//*********************************************


				global $wpdb;
				$tm = projecttheme_sanitize_string($_POST['tm']); //current_time('timestamp',0);


				$sr = "select * from ".$wpdb->prefix."project_pm where initiator='$myuid' and user='$uids' and datemade='$tm'";
				$rr = $wpdb->get_results($sr);

				if(count($rr) == 0)
				{

					if(empty($pid)) $pid = 0;

					$s = "insert into ".$wpdb->prefix."project_pm
					(approved, subject, content, datemade, pid, initiator, user, file_attached, show_to_destination)
					values('$approved','$subject','$message','$tm','$pid','$myuid','$uids', '$attach_id', '$show_to_destination')";

					$wpdb->query($s);


					//------------------------------

					if($ProjectTheme_moderate_private_messages == false)
						ProjectTheme_send_email_on_priv_mess_received($myuid, $uids);
					else
					{
						//send message to admin to moderate

					}


				}

			//-----------------------
				?>

                <div class="my_box3">
            	<div class="padd10">
                 <?php

				 if($ProjectTheme_moderate_private_messages == false)
				 	_e('Your message has been sent.','ProjectTheme');
				 else
				  	_e('Your message has been sent but the receiver will receive it only after moderation.','ProjectTheme')

				  ?>
                </div>
                </div>

                <?php

				else:

					if($error_mm == "1") {

						if($cant_send == 1) echo __('You cannot send a message to yourself.','ProjectTheme');
					 	else echo sprintf(__('Wrong File format: %s','ProjectTheme'), $uploaded_file_type);

					}
					else _e('ERROR! wrong username provided.','ProjectTheme');

				endif;


			}
			else
			{


		?>

        <div class="my_box3">
            <div class="box_title"><?php _e("Send Private Message to: ","ProjectTheme"); ?> <?php echo $user->user_login; ?></div>
                <div class="box_content">
                    <form method="post" enctype="multipart/form-data">
                        <input type="hidden" name="tm" value="<?php echo current_time('timestamp',0); ?>" />
                        <table>
                            <?php if(empty($uid)):

                            $rtt = ProjectTheme_get_my_awarded_projects2($current_user->ID);

                            ?>
                            <tr>
                            <td width="140"><?php _e("Send To", "ProjectTheme"); ?>:</td>
                            <td><input size="20" name="to_as" type="text" value="" /> <?php if($rtt): _e('or','ProjectTheme'); echo " ".$rtt; endif; ?></td>
                            </tr>
                            <?php endif; ?>

                            <tr>
                            <td width="140"><?php _e("Subject", "ProjectTheme"); ?>:</td>
                            <td><input size="50" name="subject_a" type="text" value="<?php echo $subject; ?>" /></td>
                            </tr>

                            <script>

                                jQuery(document).ready(function(){
                                tinyMCE.init({
                                        mode : "specific_textareas",
                                        theme : "modern",
                                        /*plugins : "autolink, lists, spellchecker, style, layer, table, advhr, advimage, advlink, emotions, iespell, inlinepopups, insertdatetime, preview, media, searchreplace, print, contextmenu, paste, directionality, fullscreen, noneditable, visualchars, nonbreaking, xhtmlxtras, template",*/
                                        editor_selector :"tinymce-enabled"
                                    });
                                });

                            </script>

                            <tr>
                            <td valign="top"><?php _e("Message", "ProjectTheme"); ?>:</td>
                            <td><textarea name="message_a" class="tinymce-enabled" rows="6" cols="50"></textarea></td>
                            </tr>


                            <tr>
                            <td valign="top"><?php _e("Attach File", "ProjectTheme"); ?>:</td>
                            <td><input type="file" name="file_instant" class="" /> <?php _e('Only PDF, ZIP, Office files and Images.','ProjectTheme'); ?></td>
                            </tr>


                            <tr>
                            <td width="140">&nbsp;</td>
                            <td></td>
                            </tr>

                            <tr>
                            <td width="140">&nbsp;</td>
                            <td><input name="send_a" class="submit_bottom2" type="submit" value="<?php _e("Send Message",'ProjectTheme'); ?>" /></td>
                            </tr>

                        </table>
                    </form>

                </div>
            </div>


        <?php } } ?>


        </div> <!-- end dif content -->

        <?php ProjectTheme_get_users_links(); ?>



<?php
}


?>