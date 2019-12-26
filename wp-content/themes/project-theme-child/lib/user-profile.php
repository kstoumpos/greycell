<?php

    if(!is_user_logged_in()) { wp_redirect(home_url()."/wp-login.php"); exit; }


	global $wpdb,$wp_rewrite,$wp_query;
	$username = urldecode($wp_query->query_vars['post_author']);
	$uid = $username;
	$paged = $wp_query->query_vars['paged'];

	$user = get_userdata($uid);
	if($user == false)  {
		$user = get_user_by('login', $username);
		$uid = $user->ID;
	}

	$username = $user->user_login;

	function sitemile_filter_ttl($title){return __("User Profile",'ProjectTheme')." - ";}
	add_filter( 'wp_title', 'sitemile_filter_ttl', 10, 3 );

    get_header();
?>



<div class="page_heading_me">
    <div class="page_heading_me_inner">
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <div class="mm_inn">
                <?php printf(__("User Profile - %s", 'ProjectTheme'), $username); ?>
            </div>
        </div>
    </div>
</div>
<!-- ########## -->

<div id="main_wrapper">
    <div id="main" class="wrapper">
        <div id="content">
    		<div class="my_box3">
                <div class="padd10">
            	    <div class="box_content">
                        <div class="user-profile-description">
                            <?php
                                $info = get_user_meta($uid, 'user_description', true);
                                if(empty($info)) _e("No personal info defined.",'ProjectTheme');
                                else echo $info;
                            ?>

                	        <p>
			                    <ul class="other-dets_m">
                                    <?php
                                        $arrms = ProjectTheme_get_user_fields_values($uid);

                                        if(count($arrms) > 0)
                                            for($i=0;$i<count($arrms);$i++) {
                                    ?>
                                    <li>
                                        <h3><?php echo $arrms[$i]['field_name'];?>:</h3>
                                        <p><?php echo $arrms[$i]['field_value'];?></p>
                                    </li>
				                    <?php } ?>
                                </ul>
                            </p>

                        </div>

                        <div class="user-profile-avatar">
                            <img class="imgImg" width="100" height="100" src="<?php echo ProjectTheme_get_avatar($uid,100,100); ?>" />
                            <div class="price-per-hr" style="text-align:center">
                                <?php 
                                $current_user = wp_get_current_user();
                                if($current_user->user_login != $username) {
                                    ?>
                                    <br/>
                                    <a href="<?php echo ProjectTheme_get_priv_mess_page_url('send', '', '&uid='.$uid); ?>">
                                        <?php echo __('Contact User','ProjectTheme'); ?>
                                    </a>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
                if(ProjectTheme_is_user_business($uid)):
                    ?>
                    <div class="clear10"></div>

                    <div class="box_title"><?php _e("User Latest Posted Projects",'ProjectTheme'); ?></div>

                    <?php

                        $closed = array(
                            'key' => 'closed',
                            'value' => '0',
                            'compare' => '='
                        );

                        $nrpostsPage = 8;
                        $args = array( 'author' => $uid , 'meta_query' => array($closed)  ,'posts_per_page' => $nrpostsPage, 'paged' => $paged, 'post_type' => 'project', 'order' => "DESC" , 'orderby'=>"date");
                        $the_query = new WP_Query( $args );

                        // The Loop
                        if($the_query->have_posts()):
                        while ( $the_query->have_posts() ) : $the_query->the_post();

                            projectTheme_get_post();


                        endwhile;

                        if(function_exists('wp_pagenavi'))
                        wp_pagenavi( array( 'query' => $the_query ) );

                    ?>

                    <?php
                        else:

                        echo '<div class="my_box3"> <div class="padd10">'.__('No projects posted.','ProjectTheme') . '</div></div>';

                        endif;
                        // Reset Post Data
                        wp_reset_postdata();
                    ?>

                <?php endif;

                if(ProjectTheme_is_user_provider($uid)):
                    ?>
                    <div class="clear10"></div>

                    <div class="box_title"><?php _e("Portfolio Pictures",'ProjectTheme');
                        echo '<link media="screen" rel="stylesheet" href="'.get_template_directory_uri().'/css/colorbox.css" />';
                        echo '<script src="'.get_template_directory_uri().'/js/jquery.colorbox.js"></script>';

                        ?>
                    </div>
                    <div class="my_box3">
                        <div class="box_content">
                            <script>
                                var $ = jQuery;
                                $(document).ready(function(){
                                    $("a[rel='image_gal1']").colorbox();
                                });
                            </script>

                            <?php

                                $args = array(
                                'order'          => 'ASC',
                                'orderby'        => 'post_date',
                                'post_type'      => 'attachment',
                                'author'    => $uid,
                                'meta_key' 		=> 'is_portfolio',
                                'meta_value' 	=> '1',
                                'post_mime_type' => 'image',
                                'numberposts'    => -1,
                                );

                                $attachments = get_posts($args);



                                if ($attachments) {
                                    foreach ($attachments as $attachment) {
                                        $url = ($attachment->ID);

                                        echo '<div class="div_div"  id="image_ss'.$attachment->ID.'"> <a href="'.ProjectTheme_generate_thumb($url, 900,600).'" rel="image_gal1"><img width="70" class="image_class" height="70" src="' .
                                        ProjectTheme_generate_thumb($url, 70, 70). '" /></a>

                                        </div>';
                                    }
                                } else { 
                                    echo __('There are no pictures yet.','ProjectTheme'); 
                                }
                            ?>

                    </div>
        </div>
            <?php endif;

            if(ProjectTheme_is_user_provider($uid)):
            if(ProjectTheme_2_user_types()):
                ?>

                <div class="box_title">
                    <?php _e("User Latest Feedback",'ProjectTheme'); ?>
                    <span class="sml_ltrs"> 
                        [<a href="<?php echo esc_url( home_url() )  ?>?p_action=user_feedback&post_author=<?php echo $uid; ?>"><?php _e('See All Feedback','ProjectTheme'); ?></a>]</span>
                </div>

                <div class="my_box3">
                    <div class="padd10">
                        <div class="box_content">
                            <!-- ####### -->
                            <?php

                                global $wpdb;
                                $query = "select * from ".$wpdb->prefix."project_ratings where touser='$uid' AND awarded='1' AND approved = 1 order by id desc limit 5";
                                $r = $wpdb->get_results($query);

                                $query1 = "select * from ".$wpdb->prefix."project_ratings where fromuser='$uid' AND awarded='1' AND approved = 1 order by id desc limit 5";
                                $r1 = $wpdb->get_results($query1);

                                if(count($r) > 0 && count($r1) > 0) {
                                    $i = 1;
                            
                                    foreach($r as $row) {
                                        $post 	= $row->pid;
                                        $post 	= get_post($post);
                                        $bid 	= projectTheme_get_winner_bid($row->pid);
                                        $user 	= get_userdata($row->fromuser);
                                        
                                        $dmt2 =  get_post_meta($row->pid,'closed_date',true);
                                        
                                        if(!empty($dmt2))
                                            $dmt = date_i18n('M-Y', $dmt2);
                                        if ( $i == ((count($r)) && $i == (count($r1)))) {
                                            echo '<table class = "last">';
                                                echo '<tr>';
                                                    echo '<td><img width="42" height="42" class="img_class" src="'.ProjectTheme_get_first_post_image($row->pid, 42, 42).'" alt="'.$post->post_title.'" />
                                                        <a href="'.get_permalink($row->pid).'">'.$post->post_title.'</a>
                                                    </td>';
                                                    echo '<td>'.ProjectTheme_get_project_stars(floor(($row->consistency_grade+$row->communication_grade)/2)).'</td>';
                                                    echo '<td style="font-weight:bold;">' .floor(($row->consistency_grade+$row->communication_grade)/2).'/5</td>';
                                                echo '</tr>';
            
                                                echo '<tr>';
                                                    echo '<td style="width: 80%;"> 
                                                    '.$row->review_comments.'
                                                        <br>
                                                        <div style="float:right; margin-right: 34px;">
                                                            -'.$user->user_login.','
                                                            .$dmt.'	
                                                        </div>
                                                        </td>'	;
                                                    echo '<td>';
                                                        echo '<table>';
                                                            echo '<tr>';
                                                                echo '<td>' . __('Communication:','ProjectTheme').'</td>';
                                                            echo '</tr>';
                                                            echo '<tr>';
                                                                echo '<td>'.ProjectTheme_get_project_stars($row->communication_grade).'</td>';
                                                            echo '</tr>';
                                                            echo '<tr>';
                                                                echo '<td>'. __('Consistency:','ProjectTheme').'</td>';
                                                            echo '</tr>';
                                                            echo '<tr>';
                                                                echo '<td>'.ProjectTheme_get_project_stars($row->consistency_grade).'</td>';
                                                            echo '</tr>';
                                                        echo '</table>';
                                                    echo '</td>';
                                                echo '</tr>';
                                            echo '</table>';
                                        } else {
                                            echo '<table class="table_border">';
                                                echo '<tr>';
                                                    echo '<td><img width="42" height="42" class="img_class" src="'.ProjectTheme_get_first_post_image($row->pid, 42, 42).'" alt="'.$post->post_title.'" />
                                                        <a href="'.get_permalink($row->pid).'">'.$post->post_title.'</a>
                                                    </td>';
                                                    echo '<td>'.ProjectTheme_get_project_stars(floor(($row->consistency_grade+$row->communication_grade)/2)).'</td>';
                                                    echo '<td style="font-weight:bold;">' .floor(($row->consistency_grade+$row->communication_grade)/2).'/5</td>';
                                                echo '</tr>';
            
                                                echo '<tr>';
                                                    echo '<td style="width: 80%;"> 
                                                        '.$row->review_comments.'
                                                        <br>
                                                        <div style="float:right; margin-right: 34px;">
                                                            -'.$user->user_login.','
                                                            .$dmt.'	
                                                        </div>
                                                        </td>'	;
                                                    echo '<td>';
                                                        echo '<table>';
                                                            echo '<tr>';
                                                                echo '<td>' . __('Communication:','ProjectTheme').'</td>';
                                                            echo '</tr>';
                                                            echo '<tr>';
                                                                echo '<td>'.ProjectTheme_get_project_stars($row->communication_grade).'</td>';
                                                            echo '</tr>';
                                                            echo '<tr>';
                                                                echo '<td>'. __('Consistency:','ProjectTheme').'</td>';
                                                            echo '</tr>';
                                                            echo '<tr>';
                                                                echo '<td>'.ProjectTheme_get_project_stars($row->consistency_grade).'</td>';
                                                            echo '</tr>';
                                                        echo '</table>';
                                                    echo '</td>';
                                                echo '</tr>';
                                            echo '</table>';
                                        }
                                        $i++;
                                    }
                                    
                                } else {
                                    _e("There are no reviews to be awarded.","ProjectTheme");	
                                }
                            ?>

                        <!-- ####### -->
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="clear10"></div>

            <div class="box_title">
                <?php _e("User Latest Won Projects",'ProjectTheme'); ?>
            </div>

            <?php

                $nrpostsPage = 8;
                $args = array( 'meta_key' => 'winner', 'meta_value' => $uid ,'posts_per_page' => $nrpostsPage, 'paged' => $paged, 'post_type' => 'project', 'order' => "DESC" , 'orderby'=>"date");
                $the_query = new WP_Query( $args );

                // The Loop
                if($the_query->have_posts()):
                while ( $the_query->have_posts() ) : $the_query->the_post();

                    projectTheme_get_post();


                endwhile;

                if(function_exists('wp_pagenavi'))
                wp_pagenavi( array( 'query' => $the_query ) );

            ?>

            <?php
                else:
                echo '<div class="my_box3"><div class="box_content">';
                echo __('No projects posted.','ProjectTheme');
                echo '</div>
                </div>';
                endif;
                // Reset Post Data
                wp_reset_postdata();
        ?>

        <div class="clear10"></div>
        <?php endif;

        if(ProjectTheme_is_user_business($uid)):
            ?>
            <div class="box_title">
                <?php _e("User Latest Feedback",'ProjectTheme'); ?>
                    <span class="sml_ltrs"> 
                        [<a href="<?php echo esc_url( home_url() )  ?>?p_action=user_feedback&post_author=<?php echo $uid; ?>"><?php _e('See All Feedback','ProjectTheme'); ?></a>]
                    </span>
            </div>

            <div class="my_box3">
                <div class="padd10">
                    <div class="box_content">
                        <!-- ####### -->
                        <?php

                            global $wpdb;
                            $query = "select * from ".$wpdb->prefix."project_ratings where touser='$uid' AND awarded='1' AND approved = 1 order by id desc limit 5";
                            $r = $wpdb->get_results($query);

                            $query1 = "select * from ".$wpdb->prefix."project_ratings where fromuser='$uid' AND awarded='1' AND approved = 1 order by id desc limit 5";
                            $r1 = $wpdb->get_results($query1);

                            if(count($r) > 0 && count($r1) > 0) {
                                $i = 1;
                    
                                foreach($r as $row) {
                                    $post 	= $row->pid;
                                    $post 	= get_post($post);
                                    $bid 	= projectTheme_get_winner_bid($row->pid);
                                    $user 	= get_userdata($row->fromuser);
                                    
                                    $dmt2 =  get_post_meta($row->pid,'closed_date',true);
                                    
                                    if(!empty($dmt2))
                                        $dmt = date_i18n('M-Y', $dmt2);
                                    if ( $i == ((count($r)) && $i == (count($r1)))) {
                                        echo '<table class = "last">';
                                            echo '<tr>';
                                                echo '<td><img width="42" height="42" class="img_class" src="'.ProjectTheme_get_first_post_image($row->pid, 42, 42).'" alt="'.$post->post_title.'" />
                                                    <a href="'.get_permalink($row->pid).'">'.$post->post_title.'</a>
                                                </td>';
                                                echo '<td>'.ProjectTheme_get_project_stars(floor(($row->consistency_grade+$row->communication_grade)/2)).'</td>';
                                                echo '<td style="font-weight:bold;">' .floor(($row->consistency_grade+$row->communication_grade)/2).'/5</td>';
                                            echo '</tr>';
        
                                            echo '<tr>';
                                                echo '<td style="width: 80%;"> 
                                                '.$row->review_comments.'
                                                    <br>
                                                    <div style="float:right; margin-right: 34px;">
                                                        -'.$user->user_login.','
                                                        .$dmt.'	
                                                    </div>
                                                    </td>'	;
                                                echo '<td>';
                                                    echo '<table>';
                                                        echo '<tr>';
                                                            echo '<td>Communication:<br>' .ProjectTheme_get_project_stars($row->communication_grade).'</td>';
                                                        echo '</tr>';
                                                        echo '<tr>';
                                                            echo '<td>Consistency:<br> ' .ProjectTheme_get_project_stars($row->consistency_grade).'</td>';
                                                        echo '</tr>';
                                                    echo '</table>';
                                                echo '</td>';
                                            echo '</tr>';
                                        echo '</table>';
                                    } else {
                                        echo '<table class="table_border">';
                                            echo '<tr>';
                                                echo '<td><img width="42" height="42" class="img_class" src="'.ProjectTheme_get_first_post_image($row->pid, 42, 42).'" alt="'.$post->post_title.'" />
                                                    <a href="'.get_permalink($row->pid).'">'.$post->post_title.'</a>
                                                </td>';
                                                echo '<td>'.ProjectTheme_get_project_stars(floor(($row->consistency_grade+$row->communication_grade)/2)).'</td>';
                                                echo '<td style="font-weight:bold;">' .floor(($row->consistency_grade+$row->communication_grade)/2).'/5</td>';
                                            echo '</tr>';
        
                                            echo '<tr>';
                                                echo '<td style="width: 80%;"> 
                                                '.$row->review_comments.'
                                                    <br>
                                                    <div style="float:right; margin-right: 34px;">
                                                        -'.$user->user_login.','
                                                        .$dmt.'	
                                                    </div>
                                                    </td>'	;
                                                echo '<td>';
                                                    echo '<table>';
                                                        echo '<tr>';
                                                            echo '<td>Communication:<br>' .ProjectTheme_get_project_stars($row->communication_grade).'</td>';
                                                        echo '</tr>';
                                                        echo '<tr>';
                                                            echo '<td>Consistency:<br> ' .ProjectTheme_get_project_stars($row->consistency_grade).'</td>';
                                                        echo '</tr>';
                                                    echo '</table>';
                                                echo '</td>';
                                            echo '</tr>';
                                        echo '</table>';
                                    }
                                    $i++;
                                }
                            } else {
                                _e("There are no reviews to be awarded.","ProjectTheme");	
                            }
                        ?>
                        <!-- ####### -->
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>


    <div id="right-sidebar">
        <?php dynamic_sidebar( 'other-page-area' ); ?>
    </div>

</div>


<?php
	get_footer();
?>