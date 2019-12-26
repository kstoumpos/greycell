<?php

function ProjectTheme_my_account_feedbacks_area_function() {
	
    global $current_user, $wpdb, $wp_query;
    $current_user=wp_get_current_user();
    $uid = $current_user->ID;
		
    ?>
    <div class="account-main-area col-xs-12 col-sm-8 col-md-8 col-lg-8">
        <div class="my_box3">
            <div class="box_title">
                <?php _e("Reviews I need to award",'ProjectTheme'); ?>
            </div>
            <div class="box_content">    
              	<?php
                    global $wpdb;
					$query = "select * from ".$wpdb->prefix."project_ratings where fromuser='$uid' AND awarded='0' AND completed = 1";
                    $r = $wpdb->get_results($query);
                    
					if(count($r) > 0 ) {
                        $tableProjectName = __('Project Title','ProjectTheme');
                        $tableProjectUser = __('To User','ProjectTheme');
                        $tableProjectDate = __('Aquired on','ProjectTheme');
                        $tableProjectPrice = __('Price','ProjectTheme');
                        $tableProjectOptions = __('Options','ProjectTheme');
						echo '<table id = "ResponsiveTable">';
							echo '<tr id = "HeadRow">';
								echo '<th>&nbsp;</th>';
								echo '<th>'.__('Project Title','ProjectTheme').'</th>';
								echo '<th>'.__('To User','ProjectTheme').'</th>';								
								echo '<th>'.__('Aquired on','ProjectTheme').'</th>';							
								echo '<th>'.__('Price','ProjectTheme').'</th>';
								echo '<th>'.__('Options','ProjectTheme').'</th>';
							echo '</tr>';	
                            
                            foreach($r as $row) {
                                $post 	= $row->pid;
                                $post 	= get_post($post);
                                $bid 	= projectTheme_get_winner_bid($row->pid);
                                $user 	= get_userdata($row->touser);
                                
                                $dmt2 = get_post_meta($row->pid,'closed_date',true);
                                
                                if(!empty($dmt2))
                                $dmt = date_i18n('d-M-Y H:i:s', $dmt2);
                                
                                echo '<tr>';
                                    
                                    echo '<th style = "padding-left: unset; margin-bottom: 20px"><img class="img_class" width="42" height="42" src="'.ProjectTheme_get_first_post_image($row->pid, 42, 42).'" 
                                    alt="'.$post->post_title.'" /></th>';	
                                    echo '<th tableHeadData = '.$tableProjectName.' ><a href="'.get_permalink($row->pid).'">'.$post->post_title.'</a></th>';	
                                    echo '<th tableHeadData = '.$tableProjectUser.'>
                                            <div class="user-avatar-me" style="display:inline-flex;">
                                                <img src="'.ProjectTheme_get_avatar($user->ID,25, 25). '" alt="avatar-user" class="acc_m1" width="25" height="25" />
                                                <a href="'.ProjectTheme_get_user_profile_link($user->ID).'">'.$user->user_login.'</a>
                                            </div>
                                        </th>';							
                                    echo '<th tableHeadData = '.$tableProjectDate.'>'.$dmt.'</th>';								
                                    echo '<th tableHeadData = '.$tableProjectPrice.'>'.projectTheme_get_show_price($bid->bid).'</th>';
                                    echo '<th tableHeadData = '.$tableProjectOptions.'><a href="'.home_url().'/?p_action=rate_user&rid='.$row->id.'">'.__('Rate User','ProjectTheme').'</a></th>';
                                
                                echo '</tr>';
                            }
						echo '</table>';
					} else {
						_e("There are no reviews to be awarded.","ProjectTheme");	
					}
				?>     
           </div>
        </div>        
           
        <div class="clear10"></div>
        
        <div class="my_box3">
            <div class="box_title">
                <?php _e("Reviews I was awarded ",'ProjectTheme'); ?>
            </div>

            <div class="box_content">
                <?php
                    
                    global $wpdb;
                    $query = "select * from ".$wpdb->prefix."project_ratings where touser='$uid' AND awarded='1' AND approved = 1";
                    $r = $wpdb->get_results($query);

                    $query1 = "select * from ".$wpdb->prefix."project_ratings where fromuser='$uid' AND awarded='1' AND approved = 1";
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
                                        echo '<td class = "completed_ratings"><img width="42" height="42" class="img_class" src="'.ProjectTheme_get_first_post_image($row->pid, 42, 42).'" alt="'.$post->post_title.'" />
                                            <a href="'.get_permalink($row->pid).'">'.$post->post_title.'</a>
                                        </td>';
                                        echo '<td class = "completed_ratings">'.ProjectTheme_get_project_stars(floor(($row->consistency_grade+$row->communication_grade)/2)).'</td>';
                                        echo '<td style="font-weight:bold;">' .floor(($row->consistency_grade+$row->communication_grade)/2).'/5</td>';
                                    echo '</tr>';

                                    echo '<tr>';
                                        echo '<td  class = "completed_ratings" style="width: 80%;">'.$row->review_comments.'<br>
                                            <div style="float:right; margin-right: 34px;">
                                                - <img src="'.ProjectTheme_get_avatar($user->ID,25, 25). '" alt="avatar-user" class="acc_m1" width="25" height="25" />
                                                '.$user->user_login.','
                                                .$dmt.'	
                                            </div>
                                            </td>'	;
                                        echo '<td class = "completed_ratings">';
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
                                        echo '<td class = "completed_ratings">'.ProjectTheme_get_project_stars(floor(($row->consistency_grade+$row->communication_grade)/2)).'</td>';
                                        echo '<td  class = "completed_ratings" style="font-weight:bold;">' .floor(($row->consistency_grade+$row->communication_grade)/2).'/5</td>';
                                    echo '</tr>';

                                    echo '<tr>';
                                        echo '<td  class = "completed_ratings" style="width: 80%;">'.$row->review_comments.'<br>
                                            <div style="float:right; margin-right: 34px;">
                                                <img src="'.ProjectTheme_get_avatar($user->ID,25, 25). '" alt="avatar-user" class="acc_m1" width="25" height="25" />
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
            </div>
        </div>
    </div>
        
    <?php		
    ProjectTheme_get_users_links(); 		
}

?>