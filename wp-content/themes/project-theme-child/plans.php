<?php
/*
Template Name: Plans_Panel
*/
?>

<?php

if(!is_user_logged_in()) { 
  echo '<div class="padd10"><div class="padd10">';
  echo sprintf(__('You must be logged in to Change Plan. Login <a href="%s">here</a>','ProjectTheme'),
  home_url()."/wp-login.php");
  echo '</div></div>';
  exit;  
}
global   $wp_query;

$gg = $wp_query->posts[0]->ID;
$post = get_post($gg);

session_start();
 
?>

<?php projecttheme_search_box_thing() ?>

<!-- ########## -->

<script>
// Functions that simulates a Click
  function eventFire(el, etype){
      if (el.fireEvent) {
          el.fireEvent('on' + etype);
      } else {
          var evObj = document.createEvent('Events');
          evObj.initEvent(etype, true, false);
          el.dispatchEvent(evObj);
      }
  }

  function buyPlan(planId) {
    if(planId == 1) {
      var secondPlan = document.getElementById("second_plan");
      secondPlan.style.display = "none";

      var thirdPlan = document.getElementById("third_plan");
      thirdPlan.style.display = "none";

      var firstPlan = document.getElementById("first_plan");

      if (firstPlan.style.display === "none") {
        firstPlan.style.display = "block";
      } else {
        firstPlan.style.display = "none";
      }

      <?php 
      $_SESSION['planId'] = 1; ?>
    } 
    else if (planId == 2) {      
      var firstPlan = document.getElementById("first_plan");
      firstPlan.style.display = "none";

      var thirdPlan = document.getElementById("third_plan");
      thirdPlan.style.display = "none";
      var secondPlan = document.getElementById("second_plan");

      if (secondPlan.style.display === "none") {
        secondPlan.style.display = "block";
      } else {
        secondPlan.style.display = "none";
      }

      <?php 
      $_SESSION['planId'] = 2; ?>
    } 
    else if (planId == 3) {      
      var firstPlan = document.getElementById("first_plan");
      firstPlan.style.display = "none";

      var secondPlan = document.getElementById("second_plan");
      secondPlan.style.display = "none";

      var thirdPlan = document.getElementById("third_plan");

      if (thirdPlan.style.display === "none") {
        thirdPlan.style.display = "block";
      } else {
        thirdPlan.style.display = "none";
      }

      <?php 
      $_SESSION['planId'] = 3; ?>
    }
  }

  function openPaypalButton(planId) {
    if(planId == 1) {
      eventFire(document.getElementById('first-paypal-button-to'), 'click');
    }
    else if(planId == 2) {
      eventFire(document.getElementById('second-paypal-button-to'), 'click');
    }
    else if(planId == 3) {
      eventFire(document.getElementById('third-paypal-button-to'), 'click');
    }
  }
</script>

<div id="main_wrapper">
  <div id="main" class="wrapper" style = "padding-top: 0px;">

    <div class="plans-panel-pricing-table">
    
    <div class="plans-panel-col">
      <div class="plans-panel-table">
        <h2> <?php echo do_shortcode('[vc_plan_name_shortcode plan_id="1"]'); ?> </h2>

        <div class="plans-panel-price">
          <?php echo do_shortcode('[vc_plan_price_shortcode plan_id="1"]'); ?> €            
        </div>

        <ul>
          <li><strong> <?php echo do_shortcode('[vc_plan_bids_shortcode plan_id="1"]'); ?> </strong> <?php _e('Bids', 'ProjectTheme'); ?> </li>
          <li><strong> <?php echo do_shortcode('[vc_plan_sealed_bids_shortcode plan_id="1"]'); ?> </strong> <?php _e('Sealed Bid', 'ProjectTheme'); ?> </li>
        </ul>
    
        <a onclick = "buyPlan('1')"> <?php _e('Buy', 'ProjectTheme'); ?></a>
    
      </div>
    </div>

    <div class="plans-panel-col">
      <div class="plans-panel-table">
        <h2> <?php echo do_shortcode('[vc_plan_name_shortcode plan_id="2"]'); ?> </h2>
        
        <div class="plans-panel-pop"> <?php _e('Popular', 'ProjectTheme'); ?> </div>
        
        <div class="plans-panel-price">
          <?php echo do_shortcode('[vc_plan_price_shortcode plan_id="2"]'); ?> €            
        </div>

        <ul>
          <li><strong> <?php echo do_shortcode('[vc_plan_bids_shortcode plan_id="2"]'); ?> </strong> <?php _e('Bids', 'ProjectTheme'); ?> </li>
          <li><strong> <?php echo do_shortcode('[vc_plan_sealed_bids_shortcode plan_id="2"]'); ?> </strong> <?php _e('Sealed Bid', 'ProjectTheme'); ?> </li>
        </ul>
        <a onclick = "buyPlan('2')"> <?php _e('Buy', 'ProjectTheme'); ?></a>
      </div>
    </div>

    <div class="plans-panel-col">
      <div class="plans-panel-table">
        <h2> <?php echo do_shortcode('[vc_plan_name_shortcode plan_id="3"]'); ?> </h2>

        <div class="plans-panel-price">
          <?php echo do_shortcode('[vc_plan_price_shortcode plan_id="3"]'); ?> €            
        </div>

        <ul>
          <li><strong> <?php echo do_shortcode('[vc_plan_bids_shortcode plan_id="3"]'); ?> </strong> <?php _e('Bids', 'ProjectTheme'); ?> </li>
          <li><strong> <?php echo do_shortcode('[vc_plan_sealed_bids_shortcode plan_id="3"]'); ?> </strong> <?php _e('Sealed Bid', 'ProjectTheme'); ?> </li>
        </ul>
        <a onclick = "buyPlan('3')"> <?php _e('Buy', 'ProjectTheme'); ?></a>
      </div>
    </div>

  </div>

  <div class = "my_box3 plans-panel-paypal-box" id = "first_plan">
      <p class = "single-plan-text">
        <?php printf(__('Price: %s €','ProjectTheme'), do_shortcode('[vc_plan_price_shortcode plan_id="1"]'));?>
      </p>
      <p class = "single-plan-text">
        <?php _e('Pay With:','ProjectTheme'); ?>
      </p>
      <a id = first-paypal-button-from onclick = openPaypalButton(1)>
        <img src="https://www.paypalobjects.com/digitalassets/c/website/marketing/apac/C2/logos-buttons/34_Yellow_CheckOut_Pill_Button.png" alt="Check out with PayPal" />
      </a>
    </div>

    <div class = "my_box3 plans-panel-paypal-box" id = "second_plan">
      <p class = "single-plan-text">
        <?php printf(__('Price: %s €','ProjectTheme'), do_shortcode('[vc_plan_price_shortcode plan_id="2"]'));?>
      </p>
      <p class = "single-plan-text">
        <?php _e('Pay With:','ProjectTheme'); ?>
      </p>
      <a id = first-paypal-button-from  onclick = openPaypalButton(2)>
        <img src="https://www.paypalobjects.com/digitalassets/c/website/marketing/apac/C2/logos-buttons/34_Yellow_CheckOut_Pill_Button.png" alt="Check out with PayPal" />
      </a>
    </div>

    <div class = "my_box3 plans-panel-paypal-box" id = "third_plan">
      <p class = "single-plan-text">
        <?php printf(__('Price: %s €','ProjectTheme'), do_shortcode('[vc_plan_price_shortcode plan_id="3"]'));?>
      </p>
      <p class = "single-plan-text">
        <?php _e('Pay With:','ProjectTheme'); ?>
      </p>
      <a id = first-paypal-button-from onclick = openPaypalButton(3)>
        <img src="https://www.paypalobjects.com/digitalassets/c/website/marketing/apac/C2/logos-buttons/34_Yellow_CheckOut_Pill_Button.png" alt="Check out with PayPal" />      
      </a>
    </div>

  </div>
</div>

<?php // get_footer(); ?>