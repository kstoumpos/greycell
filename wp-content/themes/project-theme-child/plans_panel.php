<?php /* Function and Shortcode for the Plans Panel */
function greysell_show_plans_panel () {
    ob_start();
    session_start();
    ?>

    <div id="plans-panel" class = "overlay-plans-panel">
    <div id="main" class="wrapper plans-panel" style = "padding-top: 0px;">
        <div class="plans-panel-pricing-table content">

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

        <a class="close" href="#">&times;</a>


    </div>

    <div class = "my_box3 plans-panel-paypal-box" id = "first_plan">
        <p class = "single-plan-text">
            <?php printf(__('Price: %s €','ProjectTheme'), do_shortcode('[vc_plan_price_shortcode plan_id="1"]'));?>
        </p>
        <p class = "single-plan-text">
            <?php _e('Pay With:','ProjectTheme'); ?>
        </p>
        <p class = "single-plan-text">
            <?php echo do_shortcode( '[paypal_for_digital_goods name="Αρχικό Πλάνο" price="6.9" url="https://dev.grey-cell.co.uk//thank-you/"]'); ?>
        </p>
        </div>

        <div class = "my_box3 plans-panel-paypal-box" id = "second_plan">
        <p class = "single-plan-text">
            <?php printf(__('Price: %s €','ProjectTheme'), do_shortcode('[vc_plan_price_shortcode plan_id="2"]'));?>
        </p>
        <p class = "single-plan-text">
            <?php _e('Pay With:','ProjectTheme'); ?>
        </p>
        <p class = "single-plan-text">
            <?php echo do_shortcode( '[paypal_for_digital_goods name="Βασικό Πλάνο" price="12.9" url="https://dev.grey-cell.co.uk//thank-you/"]'); ?>
        </p>
        </div>

        <div class = "my_box3 plans-panel-paypal-box" id = "third_plan">
        <p class = "single-plan-text">
            <?php printf(__('Price: %s €','ProjectTheme'), do_shortcode('[vc_plan_price_shortcode plan_id="3"]'));?>
        </p>
        <p class = "single-plan-text">
            <?php _e('Pay With:','ProjectTheme'); ?>
        </p>
        <p class = "single-plan-text">
            <?php echo do_shortcode( '[paypal_for_digital_goods name="Premium Πλάνο" price="17.9" url="https://dev.grey-cell.co.uk//thank-you/"]'); ?>
        </p>
        </div>

    </div>
    </div>

    <script>
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
    </script> <?php
    return ob_get_clean();
}
add_shortcode('greysell_plans_panel_shortcode', 'greysell_show_plans_panel');
?>
