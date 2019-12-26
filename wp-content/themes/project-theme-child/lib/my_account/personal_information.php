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


function ProjectTheme_my_account_personal_info_function() {
	
    global $current_user, $wpdb, $wp_query;
    $current_user = wp_get_current_user();
    $uid = $current_user->ID;

    if(!is_user_logged_in()) { wp_redirect(home_url()."/wp-login.php"); exit; }
	
    ?>

    <div class="account-main-area col-xs-12 col-sm-8 col-md-8 col-lg-8">	
        <?php
				
            if(isset($_POST['save-info'])) {
                //if(file_exists('cimy_update_ExtraFields'))
                cimy_update_ExtraFields_new_me();
                
                
                require_once(ABSPATH . "wp-admin" . '/includes/file.php');
                require_once(ABSPATH . "wp-admin" . '/includes/image.php');
                
                if(!empty($_FILES['avatar']["name"])) {
                    
                    add_filter( 'upload_dir', 'greysell_upload_dir'); 
                    
                    $upload_overrides 	= array( 'test_form' => false );
                    $uploaded_file 		= wp_handle_upload($_FILES['avatar'], $upload_overrides);
                    
                    $file_name_and_location = $uploaded_file['file'];
                    $file_title_for_media_library = $_FILES['avatar'  ]['name'];
                    
                    $file_name_and_location = $uploaded_file['file'];
                    $file_title_for_media_library = $_FILES['avatar']['name'];
                            
                    $arr_file_type 		= wp_check_filetype(basename($_FILES['avatar']['name']));
                    $uploaded_file_type = $arr_file_type['type'];
                    $urls  = $uploaded_file['url'];
                    
                    
                    
                    if($uploaded_file_type == "image/png" or $uploaded_file_type == "image/jpg" or $uploaded_file_type == "image/jpeg" or $uploaded_file_type == "image/gif" ) {
                    
                        $attachment = array(
                                        'post_mime_type' => $uploaded_file_type,
                                        'post_title' => 'User Avatar',
                                        'post_content' => '',
                                        'post_status' => 'inherit',
                                        'post_parent' =>  0,			
                                        'post_author' => $uid,
                                    );
                            
                    
                                    
                        $attach_id = wp_insert_attachment( $attachment, $file_name_and_location, 0 );
                        $attach_data = wp_generate_attachment_metadata( $attach_id, $file_name_and_location );
                        wp_update_attachment_metadata($attach_id,  $attach_data);
                        
                        /* Remove Filter upload dir */
                        remove_filter('upload_dir', 'greysell_upload_dir');
                        
                        $_wp_attached_file = get_post_meta($attach_id,'_wp_attached_file',true);
                    
                        if(!empty($_wp_attached_file))
                            update_user_meta($uid, 'avatar_project',  ($attach_id) );
                    
                    }
                
                }
                
                //---------------------
                
                $wpdb->query("delete from ".$wpdb->prefix."project_email_alerts where uid='$uid' ");
                
                $email_cats = ($_POST['email_cats']);

                if(is_array($email_cats) ) {
                    foreach($email_cats as $em)
                    {
                        $em = projecttheme_sanitize_string($em);

                        // Before inserting to DB, along with the chosen categories, select also the translated ones
                        //$query = "select trid from ".$wpdb->prefix."greysell_icl_translations where element_type = 'tax_project_cat' and element_id = '$em'";
                        $query = "select trid from greysell_dev.greysell_icl_translations where element_type = 'tax_project_cat' and element_id = '$em'";
                        $result = $wpdb->get_results($query);
                        $cattrid = $result[0]->trid;

                        //$query1  = "select element_id from ".$wpdb->prefix."greysell_icl_translations where element_type = 'tax_project_cat' and trid = '$cattrid' and element_id != '$em'";
                        $query1  = "select element_id from greysell_dev.greysell_icl_translations where element_type = 'tax_project_cat' and trid = '$cattrid' and element_id != '$em'"; 
                        $result1 = $wpdb->get_results($query1);
                        $trcatid = $result1[0]->element_id;

                        $wpdb->query("insert into ".$wpdb->prefix."project_email_alerts (uid,catid) values('$uid','$em') ");
                        $wpdb->query("insert into ".$wpdb->prefix."project_email_alerts (uid,catid) values('$uid','$trcatid') ");						
                    }
                }
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $user_id = wp_update_user( array( 'ID' => $uid, 'first_name' => $first_name, 'last_name' => $last_name ) );
                
                //-------------------
                //email_locs
                //****************************************************************************************************
                $ProjectTheme_enable_project_location = get_option('ProjectTheme_enable_project_location');
                if($ProjectTheme_enable_project_location != "no"):
                
                
                    $wpdb->query("delete from ".$wpdb->prefix."project_email_alerts_locs where uid='$uid' ");
                    
                    $email_cats = $_POST['email_locs'];
                    
                    if(is_array($email_cats)  )
                    foreach($email_cats as $em)
                    {
                        $em = projecttheme_sanitize_string($em);
                        $wpdb->query("insert into ".$wpdb->prefix."project_email_alerts_locs (uid,catid) values('$uid','$em') ");						
                    }
                
                endif;
                
                //****************************************************************************************************
                //-------------------
                
                $user_description = trim($_POST['user_description']);
                update_user_meta($uid, 'user_description', $user_description);
                
                
                $per_hour = trim($_POST['per_hour']);
                update_user_meta($uid, 'per_hour', $per_hour);
                
                
                $user_location = trim($_POST['project_location_cat']);
                update_user_meta($uid, 'user_location', $user_location);
                
                $user_city = trim($_POST['user_city']);
                update_user_meta($uid, 'user_city', $user_city);
                
                $personal_info = trim($_POST['paypal_email']);
                update_user_meta($uid, 'paypal_email', $personal_info);
                
                $personal_info = trim($_POST['payza_email']);
                update_user_meta($uid, 'payza_email', $personal_info);
                
                $personal_info = trim($_POST['moneybookers_email']);
                update_user_meta($uid, 'moneybookers_email', $personal_info);
                
                $user_url = trim($_POST['user_url']);
                update_user_meta($uid, 'user_url', $user_url);
                
                do_action('ProjectTheme_pers_info_save_action');
                
                if(isset($_POST['password']) && !empty($_POST['password']))
                {
                    $p1 = trim($_POST['password']);
                    $p2 = trim($_POST['reppassword']);
                    
                    if(!empty($p1) && !empty($p2))
                    {
                    
                        if($p1 == $p2)
                        {
                            global $wpdb;
                            $newp = md5($p1);
                            $sq = "update ".$wpdb->users." set user_pass='$newp' where ID='$uid'" ;
                            $wpdb->query($sq);
                            
                            $inc = 1;
                        }
                        else {
                        echo '<div class="error">'.__("Password was not updated. Passwords do not match!","ProjectTheme").'</div>'; $xxp = 1; }
                    }
                    else
                    { 
                        
                        echo '<div class="error">'.__("Password was not updated. Passwords do not match!","ProjectTheme").'</div>';	 $xxp = 1;		
                    }
                }
                    
                
                
                //---------------------------------------
                    
                $arr = $_POST['custom_field_id'];
                if(is_array($arr))
                for($i=0;$i<count($arr);$i++)
                {
                    $ids 	= $arr[$i];
                    $value 	= $_POST['custom_field_value_'.$ids];
                    
                    if(is_array($value))
                    {
                        delete_user_meta($uid, "custom_field_ID_".$ids);
                        
                        for($j=0;$j<count($value);$j++) {
                            add_user_meta($uid, "custom_field_ID_".$ids, $value[$j]);
                            
                        }
                    }
                    else
                    update_user_meta($uid, "custom_field_ID_".$ids, $value);
                    
                }
                
                //--------------------------------------------
                if($xxp != 1)
                {
                    echo '<div class="saved_thing">'.__('Info saved!','ProjectTheme');
                    
                    if($inc == 1)
                    {
                    
                        echo '<br/>'.__('Your password was changed. Redirecting to login page...','ProjectTheme');
                        echo '<meta http-equiv="refresh" content="2; url='.home_url().'/wp-login.php">';
                    
                    }
                    
                    echo '</div>';
                }
            }
            $user = get_userdata($uid);
            
            $user_location = get_user_meta($uid, 'user_location',true);
				
        ?>
         
        <script type="text/javascript">
	
	        function delete_this2(id) {
		        jQuery.ajax({
                    method: 'get',
                    url : '<?php echo home_url();?>/index.php/?_ad_delete_pid='+id,
                    dataType : 'text',
                    success: function (text) {   jQuery('#image_ss'+id).remove();  }
                }); 
	        }
 
	        <?php $user = get_userdata($uid); ?>
	
	    </script>     
            
        <form method="post"  enctype="multipart/form-data"> 
            <div class="my_box3">
                <div class="box_content">    
                    <ul class="post-new3">

                        <li>
                            <h2><?php echo __('Email','ProjectTheme'); ?>:</h2>
                            <p><input type="text" size="35" value="<?php echo $user->user_email; ?>" disabled="disabled" class="do_input" /></p>
                        </li>

                        <li>
                            <h2><?php echo __('Username','ProjectTheme'); ?>:</h2>
                            <p><input type="text" size="35" value="<?php echo $user->user_login; ?>" disabled="disabled" class="do_input" /></p>
                        </li>
		
                        <li>
                            <h2><?php echo __('First name','ProjectTheme'); ?>:</h2>
                            <p><input type="text" size="35" name="first_name" value="<?php echo $user->first_name; ?>" class="do_input" /></p>
                        </li>
		
                        <li>
                            <h2><?php echo __('Last name','ProjectTheme'); ?>:</h2>
                            <p><input type="text" size="35" name="last_name" value="<?php echo $user->last_name; ?>" class="do_input" /></p>
                        </li>
	
                        <?php
                            $opt = get_option('ProjectTheme_enable_project_location');
                            if($opt != 'no'):
                        ?>
        
                        <li>
                            <h2><?php echo __('Location','ProjectTheme'); ?>:</h2>
                            <p>
                            <?php	echo ProjectTheme_get_categories("project_location", $user_location , __("Select Location","ProjectTheme"), "do_input"); ?>
                            </p>
                        </li>
		
        
                        <li>
                            <h2><?php echo __('City','ProjectTheme'); ?>:</h2>
                            <p><input type="text" size="35" name="user_city" value="<?php echo get_user_meta($uid, 'user_city', true); ?>" class="do_input" /></p>
                        </li>
        
		                <?php endif; ?>
     
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

                        <li>
                            <h2><?php echo __('Description','ProjectTheme'); ?>:</h2>
                            <p><textarea cols="40" rows="5"  name="user_description" class="tinymce-enabled do_input"><?php echo get_user_meta($uid,'user_description',true); ?></textarea></p>
                        </li>
        
                        <?php
                        
                        $opt = get_option('ProjectTheme_paypal_enable');
                        if($opt == "yes"):
                                    
                        ?>
                        
                        <!--<li>
                            <h2><?php echo __('PayPal Email','ProjectTheme'); ?>:</h2>
                            <p><input type="email" size="35" name="paypal_email" value="<?php echo get_user_meta($uid, 'paypal_email', true); ?>" class="do_input"/></p>
                        </li>-->
        
                        <?php
                            endif;
                            
                            $opt = get_option('ProjectTheme_moneybookers_enable');
                            if($opt == "yes"):
                                    
                        ?>
        
                        <li>
                            <h2><?php echo __('Moneybookers Email','ProjectTheme'); ?>:</h2>
                            <p><input type="text" size="35" name="moneybookers_email" value="<?php echo get_user_meta($uid, 'moneybookers_email', true); ?>" class="do_input" /></p>
                        </li>
        
                        <?php
                            endif;
                            
                            $opt = get_option('ProjectTheme_alertpay_enable');
                            if($opt == "yes"):
                                    
                        ?>
        
                        <li>
                            <h2><?php echo __('Payza Email','ProjectTheme'); ?>:</h2>
                            <p><input type="text" size="35" name="payza_email" value="<?php echo get_user_meta($uid, 'payza_email', true); ?>" class="do_input" /></p>
                        </li>
                        <?php endif; ?> 
        
                        <li>
                            <h2><?php echo __('New Password', "ProjectTheme"); ?>:</h2>
                            <p><input type="password" value="" class="do_input" name="password" size="35" /></p>
                        </li>
        
                        <li>
                            <h2><?php echo __('Repeat Password', "ProjectTheme"); ?>:</h2>
                            <p><input type="password" value="" class="do_input" name="reppassword" size="35"  /></p>
                        </li>
        
        
                        <?php do_action('ProjectTheme_pers_info_fields_1'); ?>  
                        
                        <li>
                            <h2><?php echo __('Profile Avatar','ProjectTheme'); ?>:</h2>
                            <p> <input type="file" style = "display: inline;" name="avatar" id = "avatar" accept = "image/*" /> <br/>
                                <?php _e('Max file size: 1MB. Formats: .jpeg, .jpg, .png, .gif' ,'ProjectTheme'); ?>

                                <div id = "wrong-file-type-message" style = "visibility: hidden;">
                                    <p>
                                        <?php _e('You seem to have uploaded a wrong type file. Only Images are allowed. Please upload a different file.'); 
                                        ?>
                                    </p>
                                </div>

                                <?php /* Upload_dir filter removal */
                                remove_filter( 'upload_dir', 'greysell_upload_dir'); ?>

                                <script type="text/javascript"> 
                                    jQuery(document).ready(function() {
                                        var isImage = 0;                                                // Flag Variable for if the uploaded avatar file is an image
                                        jQuery('input[type=file]').change( function() {
                                            var extensions = ["png", "gif", "jpeg", "jpg"];
                                            var fileName = document.getElementById("avatar").value;
                                            var avatarExtension = fileName.split(".")[1].toLowerCase();
                                            
                                            if ( !(extensions.indexOf(avatarExtension) > -1)) {         // If the extension is not in the extension array, then we set the flag to 1
                                                isImage = 1;
                                            }
                                            else {
                                                isImage = 0;                                            // If it is in the array, the flag to 0
                                            }
                                        
                                            // Checks if the flag is 0(image extension, so the button should work)
                                            if(isImage == 0) {
                                                document.getElementById("save-info").disabled = false;                          // If it is 0, then enable the 'Save' Button(and set the default colors) 
                                                document.getElementById("save-info").style.backgroundColor = "#4886a9";         // and hide the error message
                                                document.getElementById("save-info").style.borderColor = "#0842a0";

                                                document.getElementById("wrong-file-type-message").style.visibility = "hidden";
                                            }
                                            // or 1(not an image extension, so button disabled and change color)
                                            else
                                            {
                                                document.getElementById("save-info").disabled = true;                           // If it is 1, then disable the 'Save' Button(and set the colors to grey)
                                                document.getElementById("save-info").style.backgroundColor = "#757575";         // and show the error message
                                                document.getElementById("save-info").style.borderColor = "#424242";

                                                document.getElementById("wrong-file-type-message").style.visibility = "visible";
                                            }
                                        });
                                    });
                                </script>
                                <br/>
                                <img class = "avatar-personal-information" width="50" height="50" border="0" src="<?php echo ProjectTheme_get_avatar($uid,50,50); ?>" /> 
                            </p>
                        </li>
   
   
                        <li>
                            <?php
                                if(function_exists('cimy_extract_ExtraFields'))
                                    cimy_extract_ExtraFields();
                            ?>
                        </li> 
        
                        <li>
                            <h2>&nbsp;</h2>
                            <p><input type="submit" name="save-info" id = "save-info" class="my-buttons" value="<?php _e("Save" ,'ProjectTheme'); ?>" /></p>
                        </li>
                        
                    </ul> 
                </div>
            </div>     
            
            <div class="clear10"></div>
            <?php if(ProjectTheme_is_user_provider($uid)): ?>
                <div class="my_box3">
                    <div class="box_title" id="other_infs_mm">
                        <?php _e("Other Information",'ProjectTheme'); ?>
                    </div>

                    <div class="box_content">  
                        <ul class="post-new3">
                            <?php 
                                do_action('ProjectTheme_pers_info_fields_2'); 

                                $user_tp = get_user_meta($uid,'user_tp',true);
                                if(empty($user_tp)) $user_tp = 'all';
                                
                                if($user_tp == "all") 
                                    $catid = array('all','service_buyer','service_provider');
                                else
                                    $catid = array($user_tp);
                                
                                if ( current_user_can( 'manage_options' ) ) {
                                    $catid = array('all','service_buyer','service_provider');
                                }  
                                
                                
                                
                                $k = 0;
                                $arr = ProjectTheme_get_users_category_fields($catid, $uid);
                                $exf = '';
                                
                                for($i=0;$i<count($arr);$i++) {
                                    $exf .= '<li>';
                                    $exf .= '<h2>'.$arr[$i]['field_name'].$arr[$i]['id'].':</h2>';
                                    $exf .= '<p>'.$arr[$i]['value'].'</p>';
                                    $exf .= '</li>';
                                    
                                    $k++;	
                                }	
                                
                                echo $exf;
                                
                                $uid = $current_user->ID;
                                $cid = $uid;
                                                            
                            ?>           
                                
                            <li>
                                <h2><?php 
                                echo __('Portfolio Pictures','ProjectTheme'); ?>:</h2>
                                <p>
                                    <div class="cross_cross">
                                        <?php do_action('dropzone_style')?>
                                            <script>
                                                jQuery(function() {
                                                    Dropzone.autoDiscover = false; 	 
                                                    var myDropzoneOptions = {
                                                        maxFilesize: 15,
                                                        addRemoveLinks: true,
                                                        acceptedFiles:'image/*',
                                                        clickable: true,
                                                        url: "<?php echo home_url() ?>/?my_upload_of_project_files8=1"
                                                    };

                                                    var myDropzone = new Dropzone('div#myDropzoneElement2', myDropzoneOptions);

                                                    myDropzone.on("sending", function(file, xhr, formData) {
                                                        formData.append("author", "<?php echo $current_user->ID; ?>"); // Will send the filesize along with the file as POST data.
                                                        formData.append("ID", "<?php echo $pid; ?>"); // Will send the filesize along with the file as POST data.
                                                    });

                                                    <?php

                                                        $args = array(
                                                        'order'          => 'ASC',
                                                        'orderby'        => 'post_date',
                                                        'post_type'      => 'attachment',
                                                        'author'    => 		$current_user->ID,
                                                        'meta_key' 			=> 'is_portfolio',
                                                        'meta_value' 		=> '1',
                                                
                                                        'numberposts'    	=> -1,
                                                        );
                                                        
                                                        $attachments = get_posts($args);
                                                
                                                        if ($attachments)  {
                                                            foreach ($attachments as $attachment)  {
                                                                $url = $attachment->guid;
                                                                $imggg = $attachment->post_mime_type; 
                                                                $url = wp_get_attachment_url($attachment->ID);	 
                                                                ?>	
                                                                var mockFile = { name: "<?php echo $attachment->post_title ?>", size: 12345, serverId: '<?php echo $attachment->ID ?>' };
                                                                myDropzone.options.addedfile.call(myDropzone, mockFile);
                                                                myDropzone.options.thumbnail.call(myDropzone, mockFile, "<?php echo projectTheme_generate_thumb($attachment->ID, 100, 100) ?>");						 
                                                                <?php			
                                                            }
                                                        }

                                                    ?>
                                        
                                                    myDropzone.on("success", function(file, response) {
                                                        /* Maybe display some more file information on your page */
                                                        file.serverId = response;
                                                        file.thumbnail = "<?php echo get_template_directory_uri() ?>/images/file_icon.png";
                                                    });
                                            
                                            
                                                    myDropzone.on("removedfile", function(file, response) {
                                                        /* Maybe display some more file information on your page */
                                                        delete_this2(file.serverId);
                                                    });  	
                                            
                                                });
                                            </script>

                                            <?php _e('Click the grey area below to add project images.','ProjectTheme') ?>
                                            <div class="dropzone dropzone-previews" id="myDropzoneElement2" ></div>
                                    </div>
                
                                </p>
                            </li>
            
                            <?php
                                $k++;
                            ?>
                        
                            <li>
                                <h2><?php echo __('Emails Alerts','ProjectTheme'); ?>:</h2>
                                <p><div style="border:1px solid #ccc;background:#f2f2f2; overflow:auto; width:350px; border-radius:5px; height:160px;">
                                
                                <?php
                                    
                                    global $wpdb;
                                    $ss = "select * from ".$wpdb->prefix."project_email_alerts where uid='$uid'";
                                    $rr = $wpdb->get_results($ss);
                                    
                                    $terms = get_terms( 'project_cat', 'parent=0&orderby=name&hide_empty=0' );
                                    
                                    foreach($terms as $term):
                                        
                                        $chk = (projectTheme_check_list_emails($term->term_id, $rr) == true ? "checked='checked'" : "");
                                        
                                        echo '<input type="checkbox" name="email_cats[]" '.$chk.' value="'.$term->term_id.'" /> '.$term->name."<br/>";
                                        
                                        $terms2 = get_terms( 'project_cat', 'parent='.$term->term_id.'&orderby=name&hide_empty=0' );
                                        foreach($terms2 as $term2):
                                            
                                        
                                            $chk = (projectTheme_check_list_emails($term2->term_id, $rr) == 1 ? "checked='checked'" : "");
                                            echo '&nbsp;&nbsp; &nbsp; <input type="checkbox" name="email_cats[]" '.$chk.' value="'.$term2->term_id.'" /> '.$term2->name."<br/>";
                                            
                                            $terms3 = get_terms( 'project_cat', 'parent='.$term2->term_id.'&orderby=name&hide_empty=0' );
                                            foreach($terms3 as $term3):
                                                
                                                $chk = (projectTheme_check_list_emails($term3->term_id, $rr) == 1 ? "checked='checked'" : "");
                                                echo '&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; <input type="checkbox" '.$chk.' name="email_cats[]" 
                                                value="'.$term3->term_id.'" /> '.$term3->name."<br/>";
                                            endforeach;
                                                
                                        endforeach;
                                        
                                    endforeach;
                                
                                ?>
                                
                                </div>
                                <br/>
                                *<?php _e('you will get an email notification when a project is posted in the selected categories','ProjectTheme'); ?></p>
                            </li>
            
                            <?php
                                $ProjectTheme_enable_project_location = get_option('ProjectTheme_enable_project_location');
                                if($ProjectTheme_enable_project_location != "no"):
                            ?>

                            <li>
                                <h2>&nbsp;</h2>
                                <p><div style="border:1px solid #ccc;background:#f2f2f2; overflow:auto; width:350px; border-radius:5px; height:160px;">
                                
                                <?php
                                    
                                    global $wpdb; 
                                    $ss = "select * from ".$wpdb->prefix."project_email_alerts_locs where uid='$uid'";
                                    $rr = $wpdb->get_results($ss);
                                    
                                    $terms = get_terms( 'project_location', 'parent=0&orderby=name&hide_empty=0' );
                                    
                                    foreach($terms as $term):
                                        
                                        $chk = (projectTheme_check_list_emails($term->term_id, $rr) == true ? "checked='checked'" : "");
                                        
                                        echo '<input type="checkbox" name="email_locs[]" '.$chk.' value="'.$term->term_id.'" /> '.$term->name."<br/>";
                                        
                                        $terms2 = get_terms( 'project_location', 'parent='.$term->term_id.'&orderby=name&hide_empty=0' );
                                        foreach($terms2 as $term2):
                                            
                                        
                                            $chk = (projectTheme_check_list_emails($term2->term_id, $rr) == 1 ? "checked='checked'" : "");
                                            echo '&nbsp;&nbsp; &nbsp; <input type="checkbox" name="email_locs[]" '.$chk.' value="'.$term2->term_id.'" /> '.$term2->name."<br/>";
                                            
                                            $terms3 = get_terms( 'project_location', 'parent='.$term2->term_id.'&orderby=name&hide_empty=0' );
                                            foreach($terms3 as $term3):
                                                
                                                $chk = (projectTheme_check_list_emails($term3->term_id, $rr) == 1 ? "checked='checked'" : "");
                                                echo '&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; <input type="checkbox" '.$chk.' name="email_locs[]" 
                                                value="'.$term3->term_id.'" /> '.$term3->name."<br/>";
                                            endforeach;
                                                
                                        endforeach;
                                        
                                    endforeach;
                                
                                ?>
                                
                                </div>
                                <br/>
                                *<?php _e('you will get an email notification when a project is posted in the selected locations','ProjectTheme'); ?></p>
                            </li>
            
            
                            <?php endif;
            
                                if($k == 0) {
                                    echo '<style>#other_infs_mm, #bk_save_not { display:none; } </style>';	
                                }
                            ?>
            
                        
                            <li id="bk_save_not">
                                <h2>&nbsp;</h2> <input type="hidden" value="<?php echo $uid; ?>" name="user_id" />
                                <p><input type="submit" class="my-buttons" name="save-info" value="<?php _e("Save" ,'ProjectTheme'); ?>" /></p>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            <?php endif; ?>

		</form>

        <?php 
        // show Plan Details only if the user is Provider
        if(ProjectTheme_is_user_provider($uid)) {

            $planID = get_the_author_meta('planId', $uid); 
            // get the total number of plans
            $numOfPlans = 0;

            global $wpdb;
            $query = "select * from `greysell_plans`";
            $results = $wpdb->get_results($query);
            foreach($results as $row) {
                $numOfPlans++;
            }?>

            <div class = "clear10"></div>

            <?php
            if($planID < 1 or $planID > $numOfPlans or empty($planID)) { ?>
                <div class = "my_box3" id = "plan_details">

                    <!-- <div class="box_title" id="other_infs_mm">
                        <?php //_e("You have not chosen a Plan.",'ProjectTheme'); ?> <br/> <br/>
                        <a class = "change-plan-button" href = "<?php //echo site_url()?>/συνδρομές/"> <?php //_e('Choose Plan', 'ProjectTheme');?></a>
                    </div> -->

                </div>
            <?php
            } else { ?>
                <!-- <div class = "my_box3" id = "plan_details">

                    <div class="box_title" id="other_infs_mm">
                        <?php _e("Plan Details",'ProjectTheme'); ?>
                    </div>
                    <div class="box_content">

                        <?php
                        $results = $wpdb->get_results($query);
                        foreach($results as $row) {
                            if ($planID == $row->id) {
                            $id = $row->id;
                            $name = $row->name;
                            $bids = $row->bids;
                            $price = $row->price;
                            $sealed_bids = $row->sealed_bids;
                            ?>

                            <div class="plan-details-columns">
                                <ul class="plan-details-price">
                                    <li class="plan-details-header"><?php //echo $name; ?></li>
                                    <li> <?php //echo $price.' €';?> </li>
                                    <li> <?php //printf(__('%s Bids', 'ProjectTheme'), $bids); ?> </li>
                                    <li> <?php //printf(__('%s Sealed Bids', 'ProjectTheme'), $sealed_bids); ?> </li>
                                    <li> <a  href = "<?php //echo site_url()?>/συνδρομές/" class="plan-details-button"> <?php //_e('Change Plan', 'ProjectTheme');?> </a></li>
                                </ul>
                            </div>

                            <?php
                            break;
                            }
                        }
                        ?>
                    </div>

                </div> -->
            <?php
            }
        } ?>
</div>

<?php ProjectTheme_get_users_links(); ?>

<?php } ?>
