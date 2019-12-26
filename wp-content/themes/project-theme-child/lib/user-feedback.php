<?php

    if(!is_user_logged_in()) { wp_redirect(home_url()."/wp-login.php"); exit; }

	global $wpdb,$wp_rewrite,$wp_query;
	$username = $wp_query->query_vars['post_author'];
	$uid = $username;
	$paged = $wp_query->query_vars['paged'];

	$user = get_userdata($uid);
	$username = $user->user_login;

	function sitemile_filter_ttl($title){return __("User Feedback",'ProjectTheme')." - ";}
	add_filter( 'wp_title', 'sitemile_filter_ttl', 10, 3 );	
	
    get_header();
?>

             
<div class="page_heading_me">
    <div class="page_heading_me_inner">
        <div class="mm_inn">
            <?php printf(__("User Feedback - %s", 'ProjectTheme'), $username); ?>
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
                        <!-- ####### -->
                        <?php
                            global $wpdb;
                            $page_rows = 25;
                            
                            $pagenum 	= isset($_GET['pagenum']) ? $_GET['pagenum'] : 1;
                            $max 		= ' limit ' .($pagenum - 1) * $page_rows .',' .$page_rows; 
                            
                            global $wpdb;
                            $query = "select * from ".$wpdb->prefix."project_ratings where touser='$uid' AND awarded='1' AND approved = 1 order by id desc $max";
                            $r = $wpdb->get_results($query);

                            $query1 = "select * from ".$wpdb->prefix."project_ratings where fromuser='$uid' AND awarded='1' AND approved = 1 order by id desc $max";
                            $r1 = $wpdb->get_results($query1);
                            
                            $query2 = "select count(id) tots from ".$wpdb->prefix."project_ratings where touser='$uid' AND awarded='1' order by id desc";
                            $r2 = $wpdb->get_results($query2);
                            $total 	= $r2[0]->tots;
                        
                            $last = ceil($total/$page_rows);
                            
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
        </div>

        <div id="right-sidebar">
            <ul class="xoxo">
                <?php dynamic_sidebar( 'other-page-area' ); ?>
            </ul>
        </div>
    </div>
</div> 

<?php	
	get_footer();
?>
