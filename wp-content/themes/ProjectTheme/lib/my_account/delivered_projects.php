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

function ProjectTheme_my_account_delivered_projects_area_function()
{
	
		global $current_user, $wpdb, $wp_query;
		$current_user=wp_get_current_user();
		$uid = $current_user->ID;
		
?>
  <div class="account-main-area col-xs-12 col-sm-8 col-md-8 col-lg-8">   
        
        	<div class="my_box3 border_bottom_0">
            	
            
            	<div class="box_title"><?php _e("Delivered Projects",'ProjectTheme'); ?></div>
                <div class="box_content">    
				
                
  <?php
			 
	 
				
				global $wp_query;
				$query_vars = $wp_query->query_vars;
				$post_per_page = 10;				
				
		
				$outstanding = array(
						'key' => 'delivered',
						'value' => "1",
						'compare' => '='
					);
					
				
				$paid_user = array(
						'key' => 'paid_user',
						'value' => "1",
						'compare' => '='
					);	
					
				$winner = array(
						'key' => 'winner',
						'value' => $uid,
						'compare' => '='
					);		
				
				$args = array('post_type' => 'project', 'order' => 'DESC', 'orderby' => 'date', 'posts_per_page' => $post_per_page,
				'paged' => $query_vars['paged'], 'meta_query' => array($outstanding, $winner, $paid_user));
				
				query_posts($args);

				if(have_posts()) :
				while ( have_posts() ) : the_post();
					projectTheme_get_post();
				endwhile;
				
				if(function_exists('wp_pagenavi')):
				wp_pagenavi(); endif;
				
				 else:
				
				_e("There are no delivered projects yet.",'ProjectTheme');
				
				endif;
				
				wp_reset_query();
				
				?>
                
                
               
           </div>
           </div>    
        
        
  		</div>      
<?php
		ProjectTheme_get_users_links();

}
	
?>