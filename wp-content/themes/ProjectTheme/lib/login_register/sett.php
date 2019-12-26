<?php

if ( !function_exists('ProjectTheme_new_user_notification') ) :
function ProjectTheme_new_user_notification($user_id, $plaintext_pass = '') {
	$user = new WP_User($user_id);
    
	$subject 	= get_option('ProjectTheme_new_user_email_subject');
	$message 	= get_option('ProjectTheme_new_user_email_message');	
	
	$user_login = stripslashes($user->user_login);
	$user_email = stripslashes($user->user_email);    

	$site_login_url = ProjectTheme_login_url();
	$site_name 		= get_bloginfo('name');
	$account_url 	= get_permalink(get_option('ProjectTheme_my_account_page_id'));		

	$find 		= array('##username##', '##user_email##', '##site_login_url##', '##your_site_name##', '##your_site_url##' , '##my_account_url##', '##user_password##');
	$replace 	= array($user_login, $user_email, $site_login_url, $site_name,  home_url(), $account_url, $plaintext_pass);
	$message 	= ProjectTheme_replace_stuff_for_me($find, $replace, $message);
	$subject 	= ProjectTheme_replace_stuff_for_me($find, $replace, $subject);
		
	//---------------------------------------------

	ProjectTheme_send_email($user_email, $subject, $message);

}
endif;

if ( !function_exists('ProjectTheme_new_user_notification_admin') ) :
function ProjectTheme_new_user_notification_admin($user_id) {
	$user = new WP_User($user_id);
    
	$subject 	= get_option('ProjectTheme_new_user_email_admin_subject');
	$message 	= get_option('ProjectTheme_new_user_email_admin_message');	
	
	$user_login = stripslashes($user->user_login);
	$user_email = stripslashes($user->user_email);    

	$site_login_url = ProjectTheme_login_url();
	$site_name 		= get_bloginfo('name');
	$account_url 	= get_permalink(get_option('ProjectTheme_my_account_page_id'));		

	$find 		= array('##username##', '##user_email##', '##site_login_url##', '##your_site_name##', '##your_site_url##' , '##my_account_url##', '##user_password##');
	$replace 	= array($user_login, $user_email, $site_login_url, $site_name, home_url(), $account_url, $plaintext_pass);
	$message 	= ProjectTheme_replace_stuff_for_me($find, $replace, $message);
	$subject 	= ProjectTheme_replace_stuff_for_me($find, $replace, $subject);
		
	//---------------------------------------------
	
	$email = get_bloginfo('admin_email');
	ProjectTheme_send_email($email, $subject, $message);

}
endif;

?>