<?php
/********************************************************************
*
*	ProjectTheme for WordPress - sitemile.com
*	http://sitemile.com/p/project
*	Copyright (c) 2012 sitemile.com
*	Coder: Saioc Dragos Andrei
*	Email: andreisaioc@gmail.com
*
*********************************************************************/

	get_header();
?>

<div id="main_wrapper">
	<div id="main" class="wrapper">
		<div class = "my_box3">
			<div class="padd10">
				<div class = "title_404">
					<?php _e('404', 'ProjectTheme');?>
				</div>

    			<div class="box_title sub_title_404">
					<?php _e('Not Found','ProjectTheme'); ?>
				</div>
			</div>

  <!-- ################### -->

    		<div id="right-sidebar">
    			<ul class="xoxo">
        	 		<?php dynamic_sidebar( 'single-widget-area' ); ?>
        		</ul>
    		</div>
		</div>
	</div>
</div>

<?php
	get_footer();
?>
