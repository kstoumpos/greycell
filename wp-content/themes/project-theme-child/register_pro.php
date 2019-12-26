<?php
function register_sh2() {
	ob_start();

  global $wpdb, $wp_query;

  if (!is_array($wp_query->query_vars))
  $wp_query->query_vars = array();

  switch( $_REQUEST["action"] ) {
    case 'register':
    require_once( ABSPATH . WPINC . '/registration-functions.php');
    $user_login = sanitize_user( str_replace(" ","",$_POST['user_login']) );
    $user_email = trim($_POST['user_email']);
    $sanitized_user_login = $user_login;
    $errors = Project_register_new_user_sitemile($user_login, $user_email);

    if (!is_wp_error($errors))
    {
      $ok_reg = 1;
    }
    if ( 1 == $ok_reg ) {//continues after the break;
      get_header();
      ?>

      <div class="page_heading_me">
        <div class="page_heading_me_inner">
          <div class="mm_inn"><?php printf(__("Registration Complete",'ProjectTheme')); ?></div>
        </div>
      </div>

      <div id="main_wrapper">
        <div id="main" class="wrapper">
          <div class="padd10">
            <div class="my_box3">
              <div class="padd10">
                <p><?php printf(__('Username: %s','ProjectTheme'), "<strong>" . esc_html($user_login) . "</strong>") ?><br/>
                  <?php printf(__('Password: %s','ProjectTheme'), '<strong>' . __('emailed to you','ProjectTheme') . '</strong>') ?> <br/>
                  <?php printf(__('E-mail: %s','ProjectTheme'), "<strong>" . esc_html($user_email) . "</strong>") ?><br/><br/>
                  <?php _e("Please check your <strong>Junk Mail</strong> if your account information does not appear within 7 minutes.",'ProjectTheme'); ?>
                </p>
                <br/>
                <p class="submit"><a class="go_back_btn" href="wp-login.php"><?php _e('Login', 'ProjectTheme'); ?></a></p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php
      get_footer();
      die();
      break;
    }//continued from the error check above

    default:
    global $title_me;
    $title_me = 'Register';
    add_filter( 'wp_title', 'ProjectTheme_project_pages_title', 10, 1 );

    get_header();

    ?>

    <div id="register_wrapper">
      <div id="main" class="wrapper-register">
        <div class="padd10">
          <div class="my_box3">
            <div class="padd10">
              <h3 class="h3-name"><?php echo get_the_title(); ?></h3>
              <h4>Καλώς ήρθες στη GreySell.</h4>
              <p>Με την εγγραφή σου στο site, θα μπορείς να περιηγηθείς σε όλες τις κατηγορίες, να δεις Projects και τα προφιλ των χρηστών. Θα λάβεις επίσης 3 προσφορές που μπορείς να στείλεις δωρεάν σε Projects που σε ενδιαφέρουν, χωρίς χρονικό περιορισμό για να τις χρησιμοποιήσεις.</p>
              <div class="box_content">
                <?php echo do_shortcode('[TheChamp-Login]') ?>
                <div class="or-separator"><?php _e('or', 'ProjectTheme'); ?></div>
                <?php if ( isset($errors) && isset($_POST['action']) ) : ?>
                  <div class="error">
                    <ul>
                      <?php
                      $me = $errors->get_error_messages();
                      foreach($me as $mm)
                      echo "<li>".($mm)."</li>";
                      ?>
                    </ul>
                  </div>
                <?php endif; ?>
                <div class="login-submit-form">
                  <form method="post" id="registerform" action="<?php echo esc_url( site_url('wp-login.php?action=register', 'login_post') ); ?>">
                    <input type="hidden" name="action" value="register" />
                    <p>
                      <input type="text" class="do_input_new full_wdth_me" name="user_login" id="user_login" size="30" maxlength="20" placeholder="<?php _e('Your username','ProjectTheme') ?>" value="<?php echo esc_html($user_login); ?>" />
                    </p>
                    <p>
                      <input type="text" class="do_input_new full_wdth_me" name="user_email" id="user_email" size="30" maxlength="100" placeholder="<?php _e('Your email address','ProjectTheme') ?>" value="<?php echo esc_html($user_email); ?>" />
                    </p>
                    <p>
                      <input type="password" class="do_input_new full_wdth_me" name="password" id="password" size="30" maxlength="100"  placeholder="<?php _e('Your password','ProjectTheme') ?>"  />
                    </p>
                    <p>
                      <input type="password" class="do_input_new full_wdth_me" name="cpassword" id="cpassword" size="30" maxlength="100"  placeholder="<?php _e('Your password confirmation','ProjectTheme') ?>" />
                    </p>
                    <?php
                    $ProjectTheme_enable_2_user_tp = get_option('ProjectTheme_enable_2_user_tp');
                    if($ProjectTheme_enable_2_user_tp == "yes"):
                      $enbl = true;
                      $enbl = apply_filters('ProjectTheme_enbl_two_user_types_thing',$enbl);

                      if($enbl):
                        ?>
                        <p>
                          <div class="container" style="width:100%" id="gs_registration_form">
                            <div class="row">
                              <label for="user_tp_contractor" style="display: none;">
                                <input class="pph-custom-input"
                                tabindex="6"
                                type="radio"
                                name="user_tp"
                                id="user_tp_provider"
                                value="service_provider"
                                checked="checked">
                              </label>
                            </div>
                          </div>
                        </p>
                      <?php endif; endif; ?>
                      <?php do_action('register_form'); ?>

                      <div style="text-align:center"><?php _e("By clicking below and creating an account, I agree to Grey-Cell's","ProjectTheme") ?><a target ="_blank" href="/user-agreement/"> <?php _e("User Agreement","ProjectTheme")?> </a> <?php _e("and","ProjectTheme")?> <a target="_blank" href="/privacy-policy/"><?php _e("Privacy Policy.","ProjectTheme") ?></a></div>
                      <p class="submit">
                        <label for="submitbtn">&nbsp;</label>
                        <input type="submit" class="submit_bottom" value="<?php _e('Register an Account','ProjectTheme') ?>" id="submits" name="submits"/>
                      </p>

                      <div class="alrd-register-login">
                        <?php $home = get_home_url(); ?>
                        <p>Για να αγοράσεις περισσότερες προσφορές, δες τα πακέτα μας <a href="<?php echo $home . "/συνδρομές/";  ?>">εδώ</a>.<br>
                          Έχεις ερωτήσεις;<br>Δες τη σελίδα <a href="<?php echo $home . "/πώς-λειτουργεί/";  ?>">Πως λειτουργεί</a> ή επικοινώνησε μαζί μας!
                        </p>
                      </div>
                      <div class="alrd-register-login">
                        <?php printf(__("Already have an account ? <a href='%s' class='link-man-1'>Login here</a> or <a href='%s' class='link-man-1'>Recover your password</a>.","ProjectTheme"), site_url().'/σύνδεση', site_url().'/wp-login.php?action=lostpassword'); ?>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php
      get_footer();
      die();
      break;

      case 'disabled':
      get_header();

      ?>

      <div class="clear10"></div>
      <div class="my_box3">
        <div class="padd10">
          <div class="box_title"><?php _e('Registration Disabled','ProjectTheme') ?></div>
          <div class="box_content">
            <p><?php _e('User registration is currently not allowed.','ProjectTheme') ?><br/>
              <a href="<?php echo home_url(); ?>/" title="<?php _e('Go back to the blog','ProjectTheme') ?>"><?php _e('Home','ProjectTheme') ?></a>
            </p>
          </div>
        </div>
      </div>

      <?php
      get_footer();
      die();
      break;
    }

    return ob_get_clean();
  } add_shortcode( 'reg_shortcode2', 'register_sh2' );
  ?>
