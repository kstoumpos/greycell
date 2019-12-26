<?php
/*
 * Plugin Name: WP Simple Pay Lite for Stripe Manager
 * Author: Kyle M. Brown <kyle@kylembrown.com>
 * Plugin URI: http://kylembrown.com/stripe-checkout-pro-manager
 * Description: This plug-in will show stripe transaction details.
 * Version: 1.4
 * Author URI: 
 * License: GPL2
 */



if ( ! defined( 'ABSPATH' ) ) { 
    exit; // Exit if accessed directly
}

register_activation_hook( __FILE__, 'stripe_transaction_details_activate' );
//register_deactivation_hook( __FILE__, 'stripe_transaction_details_deactivate' );
add_action('admin_menu', 'stripe_checkout_pro_manager_menu');


// Register style sheet.
add_action( 'init', 'register_plugin_styles' );

/**
 * Register style sheet.
 */
function register_plugin_styles() {
	wp_register_style( 'stripe-transaction-pro', plugins_url( 'simple-stripe-checkout-manager/css/stripe-transaction-style.css' ) );
	wp_enqueue_style( 'stripe-transaction-pro' );
}

### Wordpress action hook start to add the Menu of bid management plugin ##############
$icon='gid.jif';
function stripe_checkout_pro_manager_menu() {
	add_submenu_page( 'stripe-checkout-pro', 'Manager', 'Manager', 'manage_options', 'stripe-transaction-page', 'stripe_transaction_page' ); 
	add_submenu_page( 'stripe-checkout', 'Manager', 'Manager', 'manage_options', 'stripe-transaction-page', 'stripe_transaction_page' );
}

function stripe_transaction_page(){
	if(empty($_GET['action-type']) && empty($_GET['id'])){
		require_once plugin_dir_path( __FILE__ ) . 'inc/class.transaction-list-table.php';
		$User_Transaction_Table = new User_Transaction_Table();
		$User_Transaction_Table->prepare_items();
		require_once plugin_dir_path( __FILE__ ) . 'transaction-template.php';
	}else{
		require_once plugin_dir_path( __FILE__ ) . 'transaction-view.php';
	}
}



function sc_change_details( $html, $charge_response ) {
	global $wpdb;	
	$table_name = $wpdb->prefix."stripe_transaction_details";
	$sql_query = 'select * from '.$table_name." where stripe_transaction_id='".$charge_response->id."'";
	$result = $wpdb->get_row($sql_query);


	if(!empty($charge_response->invoice)){
		$invoice = \Stripe\Invoice::retrieve( $charge_response->invoice);
		$subscription = $invoice->subscription;
		//echo 'subscription'.$subscription;
	}

	
	if(empty($result)){
		$stripe_transaction_id = $charge_response->id;	
		$stripe_object = $charge_response->object;
		$stripe_created_at = $charge_response->created;
		$stripe_livemode = $charge_response->livemode;
		$stripe_paid = $charge_response->paid;
		$stripe_status = $charge_response->status;
		$stripe_amount = $charge_response->amount;
		$stripe_currency = $charge_response->currency;
		$stripe_refunded = $charge_response->refunded;
		$stripe_card_object = $charge_response->source->object;
		$stripe_last4 = $charge_response->source->last4;
		$stripe_brand = $charge_response->source->brand;
		$stripe_funding = $charge_response->source->funding;
		$stripe_exp_month = $charge_response->source->exp_month;
		$stripe_exp_year = $charge_response->source->exp_year;
		$stripe_fingerprint = $charge_response->source->fingerprint;
		$stripe_country = $charge_response->source->country;
		$stripe_name = $charge_response->source->name;
		$stripe_address_line1 = $charge_response->source->address_line1;
		$stripe_address_line2 = $charge_response->source->address_line2;
		$stripe_address_city = $charge_response->source->address_city;
		$stripe_address_state = $charge_response->source->address_state;
		$stripe_address_zip = $charge_response->source->address_zip;
		$stripe_address_country = $charge_response->source->address_country;
		$stripe_cvc_check = $charge_response->source->cvc_check;
		$stripe_address_line1_check = $charge_response->source->address_line1_check;
		$stripe_address_zip_check = $charge_response->source->address_zip_check;
		$stripe_dynamic_last4 = $charge_response->source->dynamic_last4;
		$stripe_balance_transaction = $charge_response->balance_transaction;	
		$stripe_failure_message = $charge_response->failure_message;
		$stripe_failure_code = $charge_response->failure_code;
		$stripe_amount_refunded = $charge_response->amount_refunded;
		$stripe_customer = $charge_response->customer;
		$stripe_invoice = $charge_response->invoice;
		$stripe_description = $charge_response->description;
		$stripe_dispute = $charge_response->dispute;
		$sql_query = "insert into $table_name (stripe_transaction_id,stripe_object,stripe_livemode,stripe_paid,stripe_status,stripe_amount,stripe_currency,stripe_refunded,stripe_card_object,stripe_last4,stripe_brand,stripe_funding,stripe_exp_month,stripe_exp_year,stripe_fingerprint,stripe_country,stripe_name,stripe_address_line1,stripe_address_line2,stripe_address_city,stripe_address_state,stripe_address_zip,stripe_address_country,stripe_cvc_check,stripe_address_line1_check,stripe_address_zip_check,stripe_dynamic_last4,stripe_balance_transaction,stripe_failure_message,stripe_failure_code,stripe_amount_refunded,stripe_customer,stripe_invoice,stripe_description,stripe_dispute) values('".$stripe_transaction_id."','".$stripe_object."','".$stripe_livemode."','".$stripe_paid."','".$stripe_status."','".$stripe_amount."','".$stripe_currency."','".$stripe_refunded."','".$stripe_card_object."','".$stripe_last4."','".$stripe_brand."','".$stripe_funding."','".$stripe_exp_month."','".$stripe_exp_year."','".$stripe_fingerprint."','".$stripe_country."','".$stripe_name."','".$stripe_address_line1."','".$stripe_address_line2."','".$stripe_address_city."','".$stripe_address_state."','".$stripe_address_zip."','".$stripe_address_country."','".$stripe_cvc_check."','".$stripe_address_line1_check."','".$stripe_address_zip_check."','".$stripe_dynamic_last4."','".$stripe_balance_transaction."','".$stripe_failure_message."','".$stripe_failure_code."','".$stripe_amount_refunded."','".$stripe_customer."','".$stripe_invoice."','".$stripe_description."','".$stripe_dispute."')";
		$wpdb->query($sql_query);
	}
	//echo '<pre>';
	//print_r($charge_response);
	

	return $html;
	
}



add_filter( 'sc_payment_details', 'sc_change_details', 10, 2 );


##### Function start to activated the  plugin with the all the possible TABLE Entities ###

function stripe_transaction_details_activate()
{
	global $wpdb;
	$table_name = $wpdb->prefix . "stripe_transaction_details";

	if($wpdb->get_var("show tables like '$table_name'") != $table_name)
	{
		$sql = "CREATE TABLE ".$table_name." (
			  id int(11) NOT NULL primary key auto_increment, 
			  stripe_transaction_id varchar(255),
			  stripe_object varchar(255),
			  stripe_created_at  TIMESTAMP,
			  stripe_livemode varchar(255),
			  stripe_paid varchar(255),
			  stripe_status varchar(255),
			  stripe_amount float(11),
			  stripe_currency varchar(255),			 
			  stripe_refunded varchar(255),
			  stripe_card_object varchar(255),
			  stripe_last4 int(11),
			  stripe_brand varchar(255),
			  stripe_funding varchar(255),
			  stripe_exp_month int(3),
			  stripe_exp_year int(5),
			  stripe_fingerprint varchar(255),
			  stripe_country varchar(255),
			  stripe_name varchar(255),
			  stripe_address_line1 varchar(255),
			  stripe_address_line2 varchar(255),
			  stripe_address_city varchar(255),
			  stripe_address_state varchar(255),
			  stripe_address_zip varchar(255),
			  stripe_address_country varchar(255),
			  stripe_cvc_check varchar(255),
			  stripe_address_line1_check varchar(255),
			  stripe_address_zip_check varchar(255),
			  stripe_dynamic_last4 varchar(255),
			  stripe_balance_transaction varchar(255),
			  stripe_failure_message varchar(255),
			  stripe_failure_code varchar(255),
			  stripe_amount_refunded varchar(255),
			  stripe_customer varchar(255),
			  stripe_invoice varchar(255),
			  stripe_description varchar(255),
			  stripe_dispute varchar(255)
		)";

		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
	}

	
}


##### Function start to deactivate the plugin with the all the possible TABLE Entities ###

function stripe_transaction_details_deactivate()
{
   global $wpdb;
   $table_name = $wpdb->prefix . 'stripe_transaction_details';
   $wpdb->query("DROP TABLE IF EXISTS $table_name");
}
?>