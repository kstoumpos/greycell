<div class="wrap">

  <h2>WP Simple Pay Lite Manager</h2>

  <h3>All Transactions</h3>
  
  <form id="transaction-filter" method="get">
    <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>" />
    <?php $User_Transaction_Table->display(); ?>
  </form>

</div>