<?php
/*
Template Name: GreySell_Plan_Page
*/
?>

<?php

if(!is_user_logged_in()) { wp_redirect(home_url()."/wp-login.php"); exit; }

get_header();
global   $wp_query;

$gg = $wp_query->posts[0]->ID;
$post = get_post($gg);

$uid = $current_user->ID;

?>

<?php projecttheme_search_box_thing() ?>

<div id="main_wrapper">
    <div id="main" class="wrapper">
      <div class = "my_box3">

      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>

      <?php
      // get id from url
      $id = $_GET['id'];
      global $current_user;
      $current_user = wp_get_current_user();
      $uid = $current_user->ID;

      //single plan
      session_start();
      $_SESSION['planId'] = $id;

      if($id) {
          global $wpdb;
          $myrows = $wpdb->get_results( "SELECT * FROM `greysell_plans`" );
          //print_r($myrows);
          foreach($myrows as $row) {
            if ($id == $row->id) {
              $id = $row->id;
              $bids = $row->bids;
              $sealed_bids = $row->sealed_bids;
              $name = $row->name;
              $price = $row->price;
            }
          }
          // echo '<p/>ID: ', $id, "<br/>";
          // echo '<p/>bids: ', $bids, "<br/>";
          // echo '<p/>sealed_bids: ', $sealed_bids, "<br/>";
          // echo '<p/>price: ', $price, "<br/>";
          // echo '<p/>name: ', $name, "<br/>";
      }

      if ( is_user_logged_in() ) {
        // Current user is logged in,
        // so let's get current user info
        $current_user = wp_get_current_user();
        // User ID
        $user_id = $current_user->ID;
      }
      ?>

      <?php
      // if (isset($_POST['freeTrial']))
      // {
      //   //set user bids to 3
      //   if ($ft == 0 ) {
      //       update_usermeta( $uid, 'myBids', $bids );
      //       //set free trial status to 1
      //       update_usermeta( $uid, 'freeTrial', '1' );
      //       //set user plan id
      //       update_usermeta( $uid, 'planId', $id );
      //       echo "Started free trial";
      //   }
      // }
      ?>

      <div id="main_wrapper">
        <div id="main" class="wrapper">
            <div class="vc_row wpb_row vc_row-fluid">
              <div class="wpb_column vc_column_container vc_col-sm-12">
                <div class="vc_column-inner"><div class="wpb_wrapper">
                  <div class="vc_row wpb_row vc_inner vc_row-fluid">
                    <div class="wpb_column vc_column_container vc_col-sm-12">
                      <div class="vc_column-inner">
                        <div class="wpb_wrapper">
                          <div class="wpb_text_column wpb_content_element  single-plan-text">
                            <!-- <div class="wpb_wrapper">
                              <p>Έχετε επιλέξει : <?php echo $name; ?></p> 
                            </div> -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="wpb_raw_code wpb_content_element wpb_raw_html">
                    <div class="wpb_wrapper">
                      <meta charset="utf-8">
                      <title></title>
                      <meta name="viewport" content="width=device-width, initial-scale=1">
                      <link rel="stylesheet" href="style.css">
                      <div class="pricing-table">
                        <div class="col">
                          <div class="table1">
                            <h2><?php echo $name; ?></h2>
                            <!-- <div class="price">
                              [vc_plan_price_shortcode]€
                            </div> -->
                            <ul>
                              <div class="single-plan-text">
                                <span class="price"><?php echo $price; ?>0€</span>
                              </div>
                              <li><strong><?php echo $bids; ?></strong><?php echo _e ("Bids"); ?> </li>
                             <li><strong><?php echo $sealed_bids; ?></strong><?php echo _e ("Sealed Bids"); ?> </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="vc_row wpb_row vc_row-fluid">
            <div class="wpb_column vc_column_container vc_col-sm-12">
              <div class="vc_column-inner">
                <div class="wpb_wrapper">
                  <div class="vc_empty_space" style="height: 32px">
                    <span class="vc_empty_space_inner">
                    </span>
                  </div>
                  <div class="wpb_raw_code wpb_content_element wpb_raw_html">
                		<div class="wpb_wrapper">
                			<!-- <div class="single-plan-text">
                        <span>Κόστος:  <?php echo $price; ?>0€</span>
                      </div> -->
                		</div>
	                </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div style = "text-align: center;">
        <div class="wpb_wrapper">
          <div class="single-plan-text">
            <span><?php echo _e("Pay with"); ?></span>
          </div>
        </div>
        <?php
        if ($id == 1) {
          echo do_shortcode( '[paypal_for_digital_goods name="Αρχικό Πλάνο" price="6.9" url="https://dev.grey-cell.co.uk/thank-you/"]');
          echo "<br>";
          echo "<a href=\"https://sandbox.coingate.com/pay/DevGreySell1\" rel=\"noopener noreferrer nofollow\" target=\"_blank\"><img alt=\"CoinGate Payment Button\" src=\"https://static.coingate.com/images/buttons/1.png\" /></a>";
          echo "<br><br>";
          // echo do_shortcode( '[wp_braintree_button item_name="My Test Product" item_amount="19.95"]' );
          }
        if ($id == 2) {
          echo do_shortcode( '[paypal_for_digital_goods name="Βασικό Πλάνο" price="12.9" url="https://dev.grey-cell.co.uk/thank-you/"]');
        }
        if ($id == 3) {
          echo do_shortcode( '[paypal_for_digital_goods name="Premium Πλάνο" price="12.9" url="https://dev.grey-cell.co.uk/thank-you/"]');
        }

      // if ($id == 4) {
      //   echo "<form method=\"POST\" action=''>";
      //   echo "<input type=\"submit\" name=\"freeTrial\"  value=\"Free trial\">";
      //   echo "</form>";
      //   $current_user = wp_get_current_user();
      //   // User ID
      //   $user_id = $current_user->ID;
      //   // print_r($user_id);
      //   // echo "<br>";
      //   $myBids = get_the_author_meta( 'myBids', $user_id );
      //   $freeTrial = get_the_author_meta( 'freeTrial', $user_id );
      //   $bids = intval($myBids);
      //   $ft = intval($freeTrial);
      //   // echo $ft;
      //   // echo "<br>";
      //   // echo $bids;
      // } ?>
    </div>

      <?php
        // $ProjectTheme_paypal_enable 		= get_option('ProjectTheme_paypal_enable');
        // if ($id != 4 ) {
        //   if($ProjectTheme_paypal_enable == "yes") {
        //     //echo '<br><a href="'.home_url().'/?p_action=paypal_listing&pid='.$pid.'" class="edit_project_pay_cls">'.__('Pay by PayPal','ProjectTheme').'</a>';
        //   }
        // }
        ?>
    </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
