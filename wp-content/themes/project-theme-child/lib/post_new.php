<?php
ob_start();

function ProjectTheme_post_new_area_function() {
    if(!is_user_logged_in()) { wp_redirect(home_url()."/wp-login.php"); exit; }

	global $wp_query, $projectOK, $current_user, $MYerror;
	$current_user = wp_get_current_user();

	$new_Project_step = $wp_query->query_vars['post_new_step'];
	if(empty($new_Project_step)) $new_Project_step = 1;

    $pid = $wp_query->query_vars['projectid'];
    if($pid == 0) $pid = 1;
    $uid = $current_user->ID;

    if(!isset($_GET['projectid'])) $set_ad = 1; else $set_ad = 0;
    
    if(!empty($_GET['projectid'])) {
        $my_main_post = get_post($_GET['projectid']);
        $cu = wp_get_current_user();
    }

    if($set_ad == 1) {
        $pid = ProjectTheme_get_auto_draft($current_user->ID);
        wp_redirect(ProjectTheme_post_new_with_pid_stuff_thg($pid));
    }
    get_template_part('lib/post_new_post');

    ?>
    <div id="content" class="sonita">
        <div class="my_box3">
            <div class="box_content">
                <?php
                    $is_it_allowed = true;
                    $is_it_allowed = apply_filters('ProjectTheme_is_it_allowed_place_bids', $is_it_allowed);

                    if($is_it_allowed != true):
                        do_action('ProjectTheme_is_it_not_allowed_place_bids_action');
                    else:
                ?>

                <?php
                    if($new_Project_step == "1") {
                        //-----------------

                        $location 	= wp_get_object_terms($pid, 'project_location', array('order' => 'ASC', 'orderby' => 'term_id' ));
                        $cat 		= wp_get_object_terms($pid, 'project_cat', array('order' => 'ASC', 'orderby' => 'term_id' ));

                        if(!empty($pid))
                        $post 		= get_post($pid);

                        if(is_array($MYerror))
                            if($projectOK == 0) {
                                echo '<div class="errrs">';
                                    echo esc_html_e('Your form has errors. Please check below, correct the errors, then submit again.','ProjectTheme');
                                echo '</div>';
                        }

                        ?>

                        <div class="sonita2">
                            <form method="post" action="<?php echo ProjectTheme_post_new_with_pid_stuff_thg($pid, '1');?>">
                                <ul class="post-new">
                                    <?php do_action('ProjectTheme_step1_before_title'); ?>

                                    <li class="<?php echo projecttheme_get_post_new_error_thing('project_title') ?>">
                                        <?php echo projecttheme_get_post_new_error_thing_display('project_title') ?>
                                        <h2>
                                            <?php echo __('Your project title', 'ProjectTheme'); ?>
                                        </h2>
                                        <p><input type="text" size="50" class="do_input_new full_wdth_me" name="project_title" placeholder="<?php _e('eg: I need a website created very soon.','ProjectTheme') ?>" value="<?php echo (empty($_POST['project_title']) ?
                                        ($post->post_title == "Auto Draft" ? "" : $post->post_title) : $_POST['project_title']); ?>" /></p>
                                    </li>

                                    <?php do_action('ProjectTheme_step1_before_description'); ?>
                                    <?php
                                        $pst = $post->post_content;
                                        $pst = str_replace("<br />","",$pst);
                                    ?>

                                    <li class="<?php echo projecttheme_get_post_new_error_thing('project_description') ?>">
                                        <?php echo projecttheme_get_post_new_error_thing_display('project_description') ?>
                                        <h2> <?php echo __('Description', 'ProjectTheme'); ?> </h2>
                                        <p>
                                            <textarea rows="6" cols="60" class="full_wdth_me do_input_new description_edit" placeholder="<?php _e('Describe here your project scope.','ProjectTheme') ?>"  name="project_description" style="resize:vertical;"><?php echo trim($pst); ?></textarea>
                                        </p>
                                    </li>

                                    <script type="text/javascript">
                                        function display_subcat(vals) {
                                            jQuery.post("<?php echo esc_url( home_url() ) ; ?>/?get_subcats_for_me=1", {queryString: ""+vals+""}, function(data){
                                                if(data.length >0) {
                                                    jQuery('#sub_cats').html(data);
                                                }
                                            });
                                        }
                                        function display_subcat2(vals) {
                                            jQuery.post("<?php echo esc_url( home_url() )  ?>/?get_locscats_for_me=1", {queryString: ""+vals+""}, function(data){
                                                if(data.length >0) {
                                                    jQuery('#sub_locs').html(data);
                                                    jQuery('#sub_locs2').html("&nbsp;");
                                                }
                                                else
                                                {
                                                    jQuery('#sub_locs').html("&nbsp;");
                                                    jQuery('#sub_locs2').html("&nbsp;");
                                                }
                                            });
                                        }
                                        function display_subcat3(vals) {
                                            jQuery.post("<?php echo esc_url( home_url() )  ?>/?get_locscats_for_me2=1", {queryString: ""+vals+""}, function(data){
                                                if(data.length >0) {
                                                    jQuery('#sub_locs2').html(data);
                                                }
                                            });
                                        }
                                    </script>

                                    <li class="<?php echo projecttheme_get_post_new_error_thing('project_category') ?>">
                                        <?php echo projecttheme_get_post_new_error_thing_display('project_category') ?>

                                        <p class="strom_100">
                                            <?php if(get_option('ProjectTheme_enable_multi_cats') == "yes"): ?>
                                                <div class="multi_cat_placeholder_thing">
                                                    <?php
                                                        $selected_arr = ProjectTheme_build_my_cat_arr($pid);
                                                        echo projectTheme_get_categories_multiple('project_cat', $selected_arr);
                                                    ?>

                                                </div>

                                            <?php else: ?>
                                                <?php
                                                    echo projectTheme_get_categories_clck("project_cat",
                                                    !isset($_POST['project_cat_cat']) ? (is_array($cat) ? $cat[0]->term_id : "") : htmlspecialchars($_POST['project_cat_cat'])
                                                    , __('Select Category','ProjectTheme'), "do_input_new", "onchange=display_subcat(this.value)");	
                                    ?></li>
                                    <li class="<?php echo projecttheme_get_post_new_error_thing('project_category_sub') ?>">
                                        <?php echo projecttheme_get_post_new_error_thing_display('project_category_sub') ?>
                                        <?php 
                                            echo '<span id="sub_cats">';
                                                $args2 = "orderby=name&order=ASC&hide_empty=0&parent=".$cat[0]->term_id;
                                                $sub_terms2 = get_terms( 'project_cat', $args2 );

                                                $ret = '<select name="subcat" class="do_input_new" id="subcategory">';
                                                $ret .= '<option value="">'.__('Select Subcategory','ProjectTheme'). '</option>';
                                                $selected1 = $cat[1]->term_id;
                                                
                                                foreach ( $sub_terms2 as $sub_term2 ) {
                                                    $sub_id2 = $sub_term2->term_id;
                                                    $ret .= '<option '.($_POST['subcat'] == $sub_id2 ? "selected='selected'" : " " ).' value="'.$sub_id2.'">'.$sub_term2->name.'</option>';
                                                }
                                                
                                                $ret .= "</select>";
                                                echo $ret;
                                            echo '</span>';
                                                    
                                        ?>
                                            <?php endif; ?>
                                        </p>
                                    </li>

                                    <?php do_action('ProjectTheme_step1_before_tags');
                                        $project_tags = '';
                                        $t = wp_get_post_tags($post->ID);
                                        foreach($t as $tags) {
                                            $project_tags .= $tags->name . ", ";
                                        }
                                    ?>

                                    <?php do_action('ProjectTheme_step1_before_price'); ?>

<!--                                    <li>-->
<!--                                        <h2>--><?php //echo __('Project Budget', 'ProjectTheme'); ?><!--</h2>-->
<!--                                            <p class="strom_100">-->
<!--                                            --><?php
//                                                $sel = get_post_meta($pid, 'budgets', true);
//                                                echo ProjecTheme_get_budgets_dropdown($sel, 'do_input_new');
//                                            ?>
<!--                                        </p>-->
<!--                                    </li>-->

                                    <?php do_action('ProjectTheme_step1_before_ending'); ?>
                                        
                                    <li class="<?php echo projecttheme_get_post_new_error_thing('ending') ?>">
                                        <?php echo projecttheme_get_post_new_error_thing_display('ending') ?>
                                        <h2>
                                            <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script>
                                            <link rel="stylesheet" media="all" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ui_thing.css" />
                                            <script type="text/javascript" language="javascript" src="<?php echo get_template_directory_uri(); ?>/js/timepicker.js"></script>

                                            <?php _e("Bids Ending On",'ProjectTheme'); ?>
                                        </h2>
                                        <?php
                                            $ending = $post->ending;
                                            $ending_time = gmdate("m/d/y", (int)$ending);
                                        ?>
                                        <p><input type="text" name="ending" id="ending_id" class="full_wdth_me do_input_new" value="<?php echo (empty($_POST['ending']) ?  ($post->post_title == "Auto Draft" ? "" : $ending_time) : $_POST['ending']); ?>"/>
                                        </p>
                                    </li>
                                    <script>
                                    var $ = jQuery;
                                        $(document).ready(function () {
                                            $("#ending_id").datepicker({
                                                dateFormat: "dd-M-yy",//Specific format
                                                minDate: new Date(),//Sets minDate to today's date
                                                onSelect: function (date) {
                                                    var date2 = $('#ending_id').datepicker('getDate');
                                                    var nextDayDate = $('#ending_id').datepicker('getDate', '+1d');
                                                    nextDayDate.setDate(nextDayDate.getDate() + 1);
                                                    $('#project_ending_id').datepicker('option', 'minDate', nextDayDate);
                                                    // $('#project_ending_id').datepicker('option', 'minDate', date2 + 1);
                                                }
                                            });
                                            $('#project_ending_id').datepicker({
                                                dateFormat: "dd-M-yy",
                                                onClose: function () {
                                                    var dt1 = $('#ending_id').datepicker('getDate');
                                                    var dt2 = $('#project_ending_id').datepicker('getDate');
                                                    if (dt2 <= dt1) {
                                                        var minDate = $('#project_ending_id').datepicker('option', 'minDate');
                                                        $('#project_ending_id').datepicker('setDate', minDate);
                                                    }
                                                }
                                            });
                                        });
                                    </script>
                                    <li>
                                        <h2>
                                            <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script>
                                            <link rel="stylesheet" media="all" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ui_thing.css" />
                                            <script type="text/javascript" language="javascript" src="<?php echo get_template_directory_uri(); ?>/js/timepicker.js"></script>

                                            <?php _e("The Project Ending On",'ProjectTheme'); ?>
                                        </h2>
                                            <p><input type="text" name="project_ending" id="project_ending_id" class="full_wdth_me do_input_new" value="<?php echo (empty($_POST['ending']) ?  ($post->post_title == "Auto Draft" ? "" : $ending_time) : $_POST['ending']); ?>"/></p>
                                    </li>

                                    <?php do_action('ProjectTheme_step1_before_location'); ?>
                                    <?php
                                        $ProjectTheme_enable_project_location = get_option('ProjectTheme_enable_project_location');
                                        if($ProjectTheme_enable_project_location == "yes"):
                                    ?>

                                    <!--Location Field-->

                                    <li  class="<?php echo projecttheme_get_post_new_error_thing('project_location') ?>">
                                        <?php echo projecttheme_get_post_new_error_thing_display('project_location') ?>

                                        <h2><?php echo __('Location', 'ProjectTheme'); ?></h2>
                                        <p class="strom_100">
                                            <?php

                                                echo projectTheme_get_location_clck("project_location",
                                                    !isset($_POST['project_location_cat']) ? (is_array($location) ? $location[0]->term_id : "") : htmlspecialchars($_POST['project_location_cat'])
                                                    , "do_input_new", 'onchange="display_subcat2(this.value)"' );

                                                if(!empty($location[1]->term_id)) {
                                                    echo '<br/><span id="sub_locs">';
                                                        $args2 = "orderby=name&order=ASC&hide_empty=0&parent=".$location[0]->term_id;
                                                        $sub_terms2 = get_terms( 'project_location', $args2 );
                                                    
                                                        $ret = '<select class="do_input_new" name="subloc">';
                                                        $ret .= '<option value="">'.__('Select SubLocation','ProjectTheme'). '</option>';
                                                        $selected1 = $location[1]->term_id;

                                                        foreach ( $sub_terms2 as $sub_term2 )
                                                        {
                                                            $sub_id2 = $sub_term2->term_id;
                                                            $ret .= '<option '.($selected1 == $sub_id2 ? "selected='selected'" : " " ).' value="'.$sub_id2.'">'.$sub_term2->name.'</option>';

                                                        }
                                                        $ret .= "</select>";
                                                        echo $ret;
                                                    echo '</span>';
                                                }

                                                if(!empty($location[2]->term_id)) {
                                                    echo '<br/><span id="sub_locs2">';
                                                        $args2 = "orderby=name&order=ASC&hide_empty=0&parent=".$location[1]->term_id;
                                                        $sub_terms2 = get_terms( 'project_location', $args2 );

                                                        $ret = '<select class="do_input_new" name="subloc2">';
                                                        $ret .= '<option value="">'.__('Select SubLocation','ProjectTheme'). '</option>';
                                                        $selected1 = $location[2]->term_id;

                                                        foreach ( $sub_terms2 as $sub_term2 )
                                                        {
                                                            $sub_id2 = $sub_term2->term_id;
                                                            $ret .= '<option '.($selected1 == $sub_id2 ? "selected='selected'" : " " ).' value="'.$sub_id2.'">'.$sub_term2->name.'</option>';

                                                        }
                                                        $ret .= "</select>";
                                                        echo $ret;
                                                    echo '</span>';
                                                }
                                            ?>

                                        </p>
                                    </li>
                                    <script>
                                        var $ = jQuery;
                                        $('#location_select').on('change', function() {
                                            if(this.value == "266") {
                                                $('#address_field').hide();
                                            } else {
                                                $('#address_field').show();
                                            }
                                        });
                                    </script>
                                    <!--Address Field-->
                                    <?php do_action('ProjectTheme_step1_before_address'); ?>
                                    <?php
                                        $show_address = true;
                                        $show_address = apply_filters('ProjectTheme_show_address_filter', $show_address);

                                        if($show_address == true):
                                        ?>
                                            <li id="address_field">
                                                <h2><?php echo __('Address','ProjectTheme'); ?></h2>
                                            <p><input type="text" size="50" class="full_wdth_me do_input_new" placeholder="<?php _e('eg: New York, 13221','ProjectTheme'); ?>"  name="project_location_addr" value="<?php echo !isset($_POST['project_location_addr']) ?
                                            get_post_meta($pid, 'Location', true) : $_POST['project_location_addr']; ?>" /> </p>
                                            </li>
                                    <?php endif;?>
                                    <?php endif;?>

                                    <li style="margin-top:15px;">
                                        <h3><?php _e('Attach Files','ProjectTheme'); ?></h3>
                                    </li>

                                    <li>
                                        <div class="cross_cross">
                                            <?php do_action('dropzone_style')?>

                                            <script type="text/javascript">
                                                jQuery(function() {
                                                    Dropzone.autoDiscover = false;
                                                    var myDropzoneOptions = {
                                                        maxFilesize: 15,
                                                        addRemoveLinks: true,
                                                        acceptedFiles:'.zip,.pdf,.rar,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.psd,.ai',
                                                        clickable: true,
                                                        url: "<?php echo esc_url( home_url() )  ?>/?my_upload_of_project_files_proj=1"
                                                    };
                                                    var myDropzone = new Dropzone('div#myDropzoneElement', myDropzoneOptions);
                                                    myDropzone.on("sending", function(file, xhr, formData) {
                                                        formData.append("author", "<?php echo $cid; ?>"); // Will send the filesize along with the file as POST data.
                                                        formData.append("ID", "<?php echo $pid; ?>"); // Will send the filesize along with the file as POST data.
                                                    });
                                                    <?php
                                                        $args = array(
                                                        'order'          => 'ASC',
                                                        'orderby'        => 'menu_order',
                                                        'post_type'      => 'attachment',
                                                        'meta_key' 		=> 'is_prj_file',
                                                        'meta_value' 	=> '1',
                                                        'post_parent'    => $pid,
                                                        'post_status'    => null,
                                                        'numberposts'    => -1,
                                                        );
                                                        $attachments = get_posts($args);

                                                        if($pid > 0)
                                                            if ($attachments) {
                                                                foreach ($attachments as $attachment) {
                                                                    $url = $attachment->guid;
                                                                    $imggg = $attachment->post_mime_type;

                                                                    if('image/png' != $imggg && 'image/jpeg' != $imggg) {
                                                                        $url = wp_get_attachment_url($attachment->ID);

                                                                        ?>
                                                                        var mockFile = { name: "<?php echo $attachment->post_title ?>", size: 12345, serverId: '<?php echo $attachment->ID ?>' };
                                                                        myDropzone.options.addedfile.call(myDropzone, mockFile);
                                                                        myDropzone.options.thumbnail.call(myDropzone, mockFile, "<?php echo get_template_directory_uri() ?>/images/file_icon.png");
                                                                        <?php
                                                                    }
                                                                }
                                                            }
                                                    ?>
                                                    myDropzone.on("success", function(file, response) {
                                                        /* Maybe display some more file information on your page */
                                                        file.serverId = response;
                                                        file.thumbnail = "<?php echo get_template_directory_uri() ?>/images/file_icon.png";
                                                    });
                                                    myDropzone.on("removedfile", function(file, response) {
                                                        jQuery.ajax({
                                                            type: 'POST',
                                                            url : '<?php echo home_url();?>/index.php/?_ad_delete_pid='+file.serverId,
                                                            data: {id: file.serverId,request: 2}
                                                        });
                                                    });
                                                });
                                            </script>

                                            <?php _e('Click the grey area below to add project files. Images are not accepted.','ProjectTheme') ?>
                                            <div class="dropzone dropzone-previews" id="myDropzoneElement" ></div>
                                        </div>
                                    </li>
                                        <?php do_action('ProjectTheme_step1_after_submit'); ?>
                                    <li>
                                    <h2>&nbsp;</h2>
                                        <p>
                                            <input type="submit" name="project_submit1" value="<?php _e("Next Step", 'ProjectTheme'); ?>" class="submit_bottom" style="float:right"/>
                                        </p>
                                    </li>
                                </ul>
                            </form>
                        </div>
                        <?php

                    }

                    if($new_Project_step == "2") {
                        global $MYerror, $projectOK;
                        $cid 	= $current_user->ID;
                        do_action('ProjectTheme_post_new_step2_before_images');

                        if(is_array($MYerror))
                            if($projectOK == 0) {
                                echo '<div class="errrs">';
                                    echo esc_html_e('Your form has errors. Please check below, correct the errors, then submit again.','ProjectTheme');
                                echo '</div>';
                            }
                        ?>
                        <form method="post" action="<?php echo ProjectTheme_post_new_with_pid_stuff_thg($pid, '3');?>">
                            <ul class="post-new">
                                <?php do_action('ProjectTheme_step2_before_project_files'); ?>
                                
                                <?php
                                    $show_fields_in_step2 = true;
                                    $show_fields_in_step2 = apply_filters('ProjectTheme_show_fields_in_step2', $show_fields_in_step2);

                                    if($show_fields_in_step2 == true):
                                        $catid = ProjectTheme_get_project_primary_cat($pid);
                                        $arr = ProjectTheme_get_project_category_fields($catid, $pid);

                                        for($i=0;$i<count($arr);$i++) {
                                            echo '<li class="'.projecttheme_get_post_new_error_thing('custom_field_' . $arr[$i]['id'] ).'"  >';
                                            echo projecttheme_get_post_new_error_thing_display('custom_field_' . $arr[$i]['id']);
                                            echo '<h2>'.$arr[$i]['field_name']. '</h2>';
                                            echo '<p>'.$arr[$i]['value'].'</p>';
                                            echo '</li>';
                                        }
                                    endif;

                                    $ProjectTheme_enable_featured_option = get_option('ProjectTheme_enable_featured_option');
                                    if($ProjectTheme_enable_featured_option != "no"):
                                ?>
                                <li>
                                        <h1> <?php _e("Services","ProjectTheme") ?></h1>
                                </li>
                                
                                <!--
                                <li>
                                    <h2> 
                                        <input type="checkbox" class="do_input_new" name="featured" value="1"
                                            <?php $feature = get_post_meta($pid, 'featured', true); echo ($feature == "1" ? "checked='checked'" : ""); ?> 
                                        />
                                        <?php _e("Feature project?",'ProjectTheme'); ?>
                                    </h2>
                                    <p>
                                        <?php
                                            $projectTheme_featured_fee = get_option('projectTheme_featured_fee');
                                            $sl = __('Extra fee is applied','ProjectTheme');
                                            if(empty($projectTheme_featured_fee) or $projectTheme_featured_fee <= 0) $sl = '';
                                            printf(__("By clicking this checkbox you mark your project as featured. %s", 'ProjectTheme'), $sl);
                                        ?>
                                    </p>
                                </li>
                                -->
                                <?php endif; ?>

                                <?php do_action('ProjectTheme_step2_before_feature_project'); ?>

                                <?php
                                    $ProjectTheme_enable_sealed_option = get_option('ProjectTheme_enable_sealed_option');
                                    if($ProjectTheme_enable_sealed_option != "no"):
                                ?>

                                <li>
                                    <h2> <input type="checkbox" class="do_input_new" name="private_bids" value="1"
                                            <?php $private_bids = get_post_meta($pid, 'private_bids', true); echo ($private_bids == "1" ? "checked='checked'" : ""); ?>
                                        />  <?php _e("Sealed Bidding?",'ProjectTheme'); ?></h2>
                                    <p>

                                        <?php
                                            $projectTheme_sealed_bidding_fee = get_option('projectTheme_sealed_bidding_fee');
                                            $sl = __('Extra fee is applied','ProjectTheme');
                                            if(empty($projectTheme_sealed_bidding_fee) or $projectTheme_sealed_bidding_fee <= 0) $sl = '';
                                            printf(__("By clicking this checkbox you hide your project's bids. %s: %s€", 'ProjectTheme'), $sl,$projectTheme_sealed_bidding_fee);
                                            echo ''
                                        ?>
                                    </p>
                                </li>
                                <?php endif; ?>
                                <?php do_action('ProjectTheme_step2_before_sealed_bidding'); ?>
                                <?php
                                    $ProjectTheme_enable_hide_option = get_option('ProjectTheme_enable_hide_option');
                                    if($ProjectTheme_enable_hide_option != "no"):
                                ?>
                                <!--
                                <li>
                                    <h2> <input type="checkbox" class="do_input_new" name="hide_project" value="1"
                                            <?php $hide_project = get_post_meta($pid, 'hide_project', true); echo ($hide_project == "1" ? "checked='checked'" : ""); ?>
                                        /> <?php _e("Hide Project from search engines",'ProjectTheme'); ?></h2>
                                    <p>

                                        <?php
                                            $projectTheme_hide_project_fee = get_option('projectTheme_hide_project_fee');
                                            $sl = __('Extra fee is applied','ProjectTheme');
                                            if(empty($projectTheme_hide_project_fee) or $projectTheme_hide_project_fee <= 0) $sl = '';
                                            echo sprintf(__("By clicking this checkbox you hide your project from search engines. %s", 'ProjectTheme'), $sl);
                                        ?>
                                    </p>
                                </li>
                                -->
                                <br/>
                                <?php endif; ?>
                                <?php do_action('ProjectTheme_step2_before_hide_project'); ?>
                                <?php
                                    $stp = 1;
                                    $stp = apply_filters('ProjectTheme_filter_go_back_stp2', $stp);
                                ?>
                            </ul>
                            <a href="<?php echo ProjectTheme_post_new_with_pid_stuff_thg($pid, '1'); ?>" class="go_back_btn"style="border-radius:4px;display:inline-block; float:left;"><?php _e('Go Back','ProjectTheme');?></a><input type="submit" name="project_submit2" value="<?php _e("Next Step", 'ProjectTheme'); ?>" class="submit_bottom" style="float:right"/>
                        </form>
                        <?php
                    }

                    do_action('ProjectTheme_see_if_we_can_add_steps', $new_Project_step, $pid );

                    if($new_Project_step == "3") {
                        $catid = ProjectTheme_get_project_primary_cat($pid);
                        $ProjectTheme_get_images_cost_extra = ProjectTheme_get_images_cost_extra($pid);

                        //--------------------------------------------------
                        // hide project from search engines fee calculation

                        $projectTheme_hide_project_fee = get_option('projectTheme_hide_project_fee');
                        if(!empty($projectTheme_hide_project_fee))
                        {
                            $opt = get_post_meta($pid,'hide_project',true);
                            if($opt == "0") $projectTheme_hide_project_fee = 0;


                        } else $projectTheme_hide_project_fee = 0;

                        //---------------------

                        $made_me_date 	= get_post_meta($pid,'made_me_date',true);
                        $tms 			= current_time('timestamp',0);
                        $projectTheme_project_period = get_option('projectTheme_project_period');
                        if(empty($projectTheme_project_period)) $projectTheme_project_period = 30;

                        if(empty($made_me_date)) {
                            $ee = $tms + 3600*24*$projectTheme_project_period;
                            update_post_meta($pid,'ending',$ee);
                        } else {
                            $ee = get_post_meta($pid, 'ending', true) + $tms - $made_me_date;
                            update_post_meta($pid,'ending',$ee);
                        }


                        //-------------------------------------------------------------------------------
                        // sealed bidding fee calculation

                        $projectTheme_sealed_bidding_fee = get_option('projectTheme_sealed_bidding_fee');
                        if(!empty($projectTheme_sealed_bidding_fee)) {
                            $opt = get_post_meta($pid,'private_bids',true);
                            if($opt == "0") { $projectTheme_sealed_bidding_fee = 0; }

                        } else $projectTheme_sealed_bidding_fee = 0;

                        //-------

                        $featured	 = get_post_meta($pid, 'featured', true);
                        $feat_charge = get_option('projectTheme_featured_fee');

                        if($featured != "1" ) $feat_charge = 0;

                        $custom_set = get_option('projectTheme_enable_custom_posting');
                        if($custom_set == 'yes')
                        {
                            $posting_fee = get_option('projectTheme_theme_custom_cat_'.$catid);
                            if(empty($posting_fee)) $posting_fee = 0;
                        }
                        else
                        {
                            $posting_fee = get_option('projectTheme_base_fee');
                        }

                        $total = $feat_charge + $posting_fee + $projectTheme_sealed_bidding_fee + $projectTheme_hide_project_fee + $ProjectTheme_get_images_cost_extra;

                        //-----------------------------------------------

                        $payment_arr = array();

                        $base_fee_paid 	= get_post_meta($pid, 'base_fee_paid', true);

                        if($base_fee_paid != "1" and $posting_fee > 0)
                        {
                            $my_small_arr = array();
                            $my_small_arr['fee_code'] 		= 'base_fee';
                            $my_small_arr['show_me'] 		= true;
                            $my_small_arr['amount'] 		= $posting_fee;
                            $my_small_arr['description'] 	= __('Base Fee','ProjectTheme');
                            array_push($payment_arr, $my_small_arr);
                        }
                        //-----------------------

                        $my_small_arr = array();
                        $my_small_arr['fee_code'] 		= 'extra_img';
                        $my_small_arr['show_me'] 		= true;
                        $my_small_arr['amount'] 		= $ProjectTheme_get_images_cost_extra;
                        $my_small_arr['description'] 	= __('Extra Images Fee','ProjectTheme');
                        array_push($payment_arr, $my_small_arr);
                        //------------------------

                        $featured_paid  	= get_post_meta($pid,'featured_paid',true);
                        $opt 				= get_post_meta($pid,'featured',true);

                        if($feat_charge > 0 and $featured_paid != 1 and $opt == 1) {
                            $my_small_arr = array();
                            $my_small_arr['fee_code'] 		= 'feat_fee';
                            $my_small_arr['show_me'] 		= true;
                            $my_small_arr['amount'] 		= $feat_charge;
                            $my_small_arr['description'] 	= __('Featured Fee','ProjectTheme');
                            array_push($payment_arr, $my_small_arr);
                            //------------------------
                        }

                        $private_bids_paid  = get_post_meta($pid,'private_bids_paid',true);
                        $opt 				= get_post_meta($pid,'private_bids',true);

                        if($projectTheme_sealed_bidding_fee > 0 and $private_bids_paid != 1  and ($opt == 1 or $opt == "yes")) {
                            $my_small_arr = array();
                            $my_small_arr['fee_code'] 		= 'sealed_project';
                            $my_small_arr['show_me'] 		= true;
                            $my_small_arr['amount'] 		= $projectTheme_sealed_bidding_fee;
                            $my_small_arr['description'] 	= __('Sealed Bidding Fee','ProjectTheme');
                            array_push($payment_arr, $my_small_arr);
                        }

                        $hide_project_paid 	= get_post_meta($pid,'hide_project_paid',true);
                        $opt 				= get_post_meta($pid,'hide_project',true);

                        if($projectTheme_hide_project_fee > 0 and $hide_project_paid != "1" and ($opt == "1" or $opt == "yes")) {
                            $my_small_arr = array();
                            $my_small_arr['fee_code'] 		= 'hide_project';
                            $my_small_arr['show_me'] 		= true;
                            $my_small_arr['amount'] 		= $projectTheme_hide_project_fee;
                            $my_small_arr['description'] 	= __('Hide Project From Search Engines Fee','ProjectTheme');
                            array_push($payment_arr, $my_small_arr);
                        }

                        $payment_arr 	= apply_filters('ProjectTheme_filter_payment_array', $payment_arr, $pid);
                        $new_total 		= 0;

                        foreach($payment_arr as $payment_item):
                            if($payment_item['amount'] > 0):
                                $new_total += $payment_item['amount'];
                            endif;
                        endforeach;

                        //-----------------------------------------------

                        $post 			= get_post($pid);
                        $admin_email 	= get_option('admin_email');


                        $total = apply_filters('ProjectTheme_filter_payment_total', $new_total, $pid);

                        //----------------------------------------
                        $finalize = isset($_GET['finalize']) ? true : false;
                        update_post_meta($pid, 'finalised_posted', '1');

                        //-----------
                        if($finalize == true){
                            ProjectTheme_send_email_posted_project_not_approved($pid);
                            ProjectTheme_send_email_posted_project_not_approved_admin($pid);
                            wp_redirect(get_permalink(get_option('ProjectTheme_my_account_page_id')));
                        }
                        if($total == 0 && $finalize == false) {
                            echo '<div >';
                            echo __('<h5>Thank you for posting your project with us.</h5>','ProjectTheme');

                            if(get_option('projectTheme_admin_approves_each_project') == 'yes') {
                                $my_post = array();
                                $my_post['ID'] = $pid;
                                $my_post['post_status'] = 'draft';

                                wp_update_post( $my_post );

                                echo '<br/>'.__('<h5>Your project isn`t live yet, the admin needs to approve it.</h5>', 'ProjectTheme');

                            } else {
                                $my_post = array();
                                $my_post['ID'] = $pid;
                                $my_post['post_status'] = 'publish';

                                if($finalize == true){
                                    wp_update_post( $my_post );
                                    wp_publish_post( $pid );

                                    ProjectTheme_send_email_posted_project_approved($pid);
                                    ProjectTheme_send_email_posted_project_approved_admin($pid);

                                    ProjectTheme_send_email_subscription($pid);
                                }
                            }
                            echo '</div>';
                        } elseif($total > 0 && $finalize == false) {
                                update_post_meta($pid, "paid", "0");
                                echo '<div >';
                                echo __('Thank you for posting your project with us. Below is the total price that you need to pay in order to put your project live.<br/>
                                Click the pay button and you will be redirected...', 'ProjectTheme');
                                echo '</div>';
                        }

                        //----------------------------------------

                        echo '<table style="margin-top:25px">';

                        $show_payment_table = true;
                        $show_payment_table = apply_filters('ProjectTheme_filter_payment_show_table', $show_payment_table, $pid);

                        if($show_payment_table == true and $total > 0) {
                            foreach($payment_arr as $payment_item):
                                if($payment_item['amount'] > 0):
                                    echo '<tr>';
                                    echo '<td>'.$payment_item['description'].'&nbsp; &nbsp;</td>';
                                    echo '<td>'.ProjectTheme_get_show_price($payment_item['amount'],2).'</td>';
                                    echo '</tr>';
                                endif;
                            endforeach;

                            echo '<tr>';
                            echo '<td>&nbsp;</td>';
                            echo '<td></td>';
                            echo '</tr>';


                            echo '<tr>';
                            echo '<td><strong>'.__('Total to Pay','ProjectTheme').'</strong></td>';
                            echo '<td><strong>'.ProjectTheme_get_show_price($total,2).'</strong></td>';
                            echo '</tr>';

                            $ProjectTheme_enable_credits_wallet = get_option('ProjectTheme_enable_credits_wallet');
                            if($ProjectTheme_enable_credits_wallet != 'no'):

                                echo '<tr>';
                                echo '<td><strong>'.__('Your Total Credits','ProjectTheme').'</strong></td>';
                                echo '<td><strong>'.ProjectTheme_get_show_price(ProjectTheme_get_credits($uid),2).'</strong></td>';
                                echo '</tr>';

                            endif;

                            echo '<tr>';
                            echo '<td>&nbsp;<br/>&nbsp;</td>';
                            echo '<td></td>';
                            echo '</tr>';

                        }//endif show this table

                        if($total == 0 && $finalize == true) {
                            // if(get_option('projectTheme_admin_approves_each_project') != 'yes'):

                            // 	echo '<tr>';
                            // 	echo '<td></td>';
                            // 	echo '<td><div class="clear100"></div><a href="'.get_permalink($pid).'" class="go_back_btn">'.__('See your project','ProjectTheme') .'</a></td>';
                            // 	echo '</tr>';

                            // else:
                            // 	echo '<tr>';
                            // 	echo '<td></td>';
                            // 	echo '<td><a href="'.get_permalink(get_option('ProjectTheme_my_account_personal_info_id')).'" class="go_back_btn" style="border-radius:4px;">'.__('Complete your profile','ProjectTheme') .'</a></td>';
                            // 	echo '</tr>';

                            // endif;
                            echo '</table>';
                        } elseif($total > 0) {
                                echo '</table>';
                                update_post_meta($pid,'unpaid','1');

                                $ProjectTheme_enable_credits_wallet = get_option('ProjectTheme_enable_credits_wallet');
                                if($ProjectTheme_enable_credits_wallet != 'no'):
                                    echo '<a href="'.home_url().'/?p_action=credits_listing&pid='.$pid.'" class="edit_project_pay_cls">'.__('Pay by Credits','ProjectTheme').'</a>';
                                endif;

                                global $project_ID;
                                $project_ID = $pid;

                                //-------------------

                                $ProjectTheme_paypal_enable 		= get_option('ProjectTheme_paypal_enable');
                                $ProjectTheme_alertpay_enable 		= get_option('ProjectTheme_alertpay_enable');
                                $ProjectTheme_moneybookers_enable 	= get_option('ProjectTheme_moneybookers_enable');


                                if($ProjectTheme_paypal_enable == "yes")
                                    echo '<a href="'.home_url().'/?p_action=paypal_listing&pid='.$pid.'" class="edit_project_pay_cls">'.__('Pay by PayPal','ProjectTheme').'</a>';

                                if($ProjectTheme_moneybookers_enable == "yes")
                                    echo '<a href="'.home_url().'/?p_action=mb_listing&pid='.$pid.'" class="edit_project_pay_cls">'.__('Pay by MoneyBookers/Skrill','ProjectTheme').'</a>';

                                if($ProjectTheme_alertpay_enable == "yes")
                                    echo '<a href="'.home_url().'/?p_action=payza_listing&pid='.$pid.'" class="edit_project_pay_cls">'.__('Pay by Payza','ProjectTheme').'</a>';

                                do_action('ProjectTheme_add_payment_options_to_post_new_project', $pid);

                        } else {
                            echo '</table>';
                        }


                        echo '<div class="clear10"></div>';
                        echo '<div class="clear10"></div>';
                        echo '<div class="clear10"></div>';

                        echo '<div class="padd10">';
                            if($finalize == false)
                                echo ' <a href="'. ProjectTheme_post_new_with_pid_stuff_thg($pid, '2') .'" class="go_back_btn" style="border-radius:4px;float: left;">'.__('Go Back','ProjectTheme').'</a>';

                            if($total == 0 && $finalize == false)
                                echo ' <a href="'. ProjectTheme_post_new_with_pid_stuff_thg($pid, '3', 'finalize').'" class="go_back_btn" style="float:right;border-radius:4px;">'.__('Finalize Project','ProjectTheme').'</a>';
                        echo '</div>';
                    }

                    ?>

                    <?php endif; ?>
            </div>
        </div>
    </div>
    
<?php 
    
} ?>
