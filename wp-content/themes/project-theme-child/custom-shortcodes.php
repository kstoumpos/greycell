<?php

function Project_register_new_user_sitemile( $user_login, $user_email ) {
    $errors = new WP_Error();

    $sanitized_user_login = sanitize_user( $user_login );
    $user_email = apply_filters( 'user_registration_email', $user_email );

    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    // Check the username
    if ( $sanitized_user_login == '' ) {
        $errors->add( 'empty_username', __( '<strong>ERROR</strong>: Please enter a username.', 'ProjectTheme' ) );
    } elseif ( ! validate_username( $user_login ) ) {
            $errors->add( 'invalid_username', __( '<strong>ERROR</strong>: This username is invalid because it uses illegal characters. Please enter a valid username.', 'ProjectTheme' ) );
            $sanitized_user_login = '';
    } elseif ( username_exists( $sanitized_user_login ) ) {
            $errors->add( 'username_exists', __( '<strong>ERROR</strong>: This username is already registered, please choose another one.', 'ProjectTheme' ) );
    }

    // Check the e-mail address
    if ( $user_email == '' ) {
        $errors->add( 'empty_email', __( '<strong>ERROR</strong>: Please type your e-mail address.', 'ProjectTheme' ) );
    } elseif ( ! is_email( $user_email ) ) {
            $errors->add( 'invalid_email', __( '<strong>ERROR</strong>: The email address isn&#8217;t correct.', 'ProjectTheme' ) );
            $user_email = '';
    } elseif ( email_exists( $user_email ) ) {
            $errors->add( 'email_exists', __( '<strong>ERROR</strong>: This email is already registered, please choose another one.', 'ProjectTheme' ) );
    }


    if ( strlen($password) < 5 ) {
        $errors->add( 'pass', __( '<strong>ERROR</strong>: Please type a password with at least 5 characters.', 'ProjectTheme' ) );
    } else if ( $password!= $cpassword ) {
            $errors->add( 'pass', __( '<strong>ERROR</strong>: Your password doesnt match the confirmation.', 'ProjectTheme' ) );
    }

    do_action( 'register_post', $sanitized_user_login, $user_email, $errors );

    $errors = apply_filters( 'registration_errors', $errors, $sanitized_user_login, $user_email );

    if ( $errors->get_error_code() )
        return $errors;

    //--------------------

    $user_tp = $_POST['user_tp'];
    if(empty($user_tp)) $capa = 'subscriber';
    else $capa = $user_tp;

    //--------------------

    $user_pass = $password; //wp_generate_password( 12, false);

    $user_id = wp_create_user( $sanitized_user_login, $user_pass, $user_email, $capa );
    if ( ! $user_id ) {
        $errors->add( 'registerfail', sprintf( __( '<strong>ERROR</strong>: Couldn&#8217;t register you... please contact the <a href="mailto:%s">webmaster</a> !', 'ProjectTheme' ), get_option( 'admin_email' ) ) );
        return $errors;
    }

    //---------------------

    $user = new WP_User($user_id);
    $user->set_role($capa);

    //---------------------

    update_user_meta( $user_id, 'user_tp', $user_tp );

    update_user_option( $user_id, 'default_password_nag', true, true ); //Set up the Password change nag.
    ProjectTheme_new_user_notification($user_id, $user_pass);
    ProjectTheme_new_user_how_it_works_notification($user_id);
    ProjectTheme_new_user_notification_admin($user_id);

    return $user_id;
}

//[login_shortcode]
function login_sh(){
    ob_start();
	?> <?php

        global $wpdb, $error, $wp_query;

        if (!is_array($wp_query->query_vars))
        $wp_query->query_vars = array();

        $action = $_REQUEST['action'];
        $error = '';

        // nocache_headers();

        // header('Content-Type: '.get_bloginfo('html_type').'; charset='.get_bloginfo('charset'));

        if ( defined('RELOCATE') ){ // Move flag is set
            if ( isset( $_SERVER['PATH_INFO'] ) && ($_SERVER['PATH_INFO'] != $_SERVER['PHP_SELF']) )
                $_SERVER['PHP_SELF'] = str_replace( $_SERVER['PATH_INFO'], '', $_SERVER['PHP_SELF'] );

            $schema = ( isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on' ) ? 'https://' : 'http://';
            if ( dirname($schema . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']) != get_option('url') )
                update_option('url', dirname($schema . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']) );
        }

        $secure = ( 'https' === parse_url( site_url(), PHP_URL_SCHEME ) && 'https' === parse_url( home_url(), PHP_URL_SCHEME ) );
        // setcookie( TEST_COOKIE, 'WP Cookie check', 0, COOKIEPATH, COOKIE_DOMAIN, $secure );
        if ( SITECOOKIEPATH != COOKIEPATH )
            setcookie( TEST_COOKIE, 'WP Cookie check', 0, SITECOOKIEPATH, COOKIE_DOMAIN, $secure );


        $http_post = ('POST' == $_SERVER['REQUEST_METHOD']);
        $interim_login = isset($_REQUEST['interim-login']);

        do_action( 'login_init' );
        do_action( 'login_form_' . $action );

        switch($_REQUEST["action"]){
            //logout
            case "logout":
                wp_clearcookie();
                if(get_option("jk_logout_redirect_to"))
                    $redirect_to = get_option("jk_logout_redirect_to");
                else
                    $redirect_to = "wp-login.php";
                do_action('wp_logout');

                nocache_headers();
                if ( isset($_REQUEST['redirect_to']) )
                    $redirect_to = $_REQUEST['redirect_to'];

                wp_redirect(home_url());
                exit();
                break;

            //lost lost password
            case 'lostpassword':
            case 'retrievepassword':
                $http_post = ('POST' == $_SERVER['REQUEST_METHOD']);
                if ( $http_post ) {
                    $errors = my_retrieve_password();
                    if ( !is_wp_error($errors) ) {
                        $redirect_to = !empty( $_REQUEST['redirect_to'] ) ? $_REQUEST['redirect_to'] : 'wp-login.php?checkemail=confirm';
                        wp_safe_redirect( $redirect_to );
                        exit();
                    }
                }

                if ( isset($_GET['error']) && 'invalidkey' == $_GET['error'] ) $errors->add('invalidkey', __('Sorry, that key does not appear to be valid.','ProjectTheme'));
                    $redirect_to = apply_filters( 'lostpassword_redirect', !empty( $_REQUEST['redirect_to'] ) ? $_REQUEST['redirect_to'] : '' );

                do_action('lost_password');
                $user_login = isset($_POST['user_login']) ? stripslashes($_POST['user_login']) : '';
                get_header();

                ?>

                <!-- ########## -->

                <div id="register_wrapper">
                    <div id="main" class="wrapper-register">
                        <div class="padd10">
                            <div class="my_box4">
                                <div class="box_content">
                                    <h3 class="h3-name"><?php echo get_the_title(); ?></h3>
                                    <div class="login-submit-form">
                                        <form name="lostpass" action="<?php echo esc_url( site_url( 'wp-login.php?action=lostpassword', 'login_post' ) ); ?>" method="post" id="loginform">
                                            <p><?php _e('Please enter your information here. We will send you a new password.','ProjectTheme'); ?></p>
                                            <?php if ($errors) {
                                                echo "<div class='errrs'>".$errors->get_error_message()."</div>";
                                            }
                                            ?>
                                            <input type="hidden" name="action" value="retrievepassword" />
                                            <p>
                                                <input type="text" class="do_input_new full_wdth_me" name="user_login" id="user_login" placeholder="<?php _e('Username or Email:','ProjectTheme') ?>" value="" size="30" tabindex="1" />
                                            </p>
                                            <?php do_action('lostpassword_form'); ?>
                                            <p><label>&nbsp;</label>
                                                <input type="submit" name="submit" id="submits" value="<?php _e('Retrieve Password','ProjectTheme'); ?>"  class="submit_bottom" tabindex="3" />
                                            </p>
                                        </form>
                                    </div>
                                    <div class="alrd-register-login">
                                        <?php printf(__("Already have an account ? <a href='%s' class='link-man-1'>Login here</a> ","ProjectTheme"), site_url().'/wp-login.php'  	); ?>
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

            case 'retrievepassword2':

                get_header();

                $user_data = get_userdatabylogin($_POST['user_login']);
                // redefining user_login ensures we return the right case in the email
                $user_login = $user_data->user_login;
                $user_email = $user_data->user_email;

                if (!$user_email || $user_email != $_POST['email']) {
                    ?>

                    <div class="my_box3">
                        <div class="padd10">
                            <div class="box_title">
                                <?php _e("Retrieve Error",'ProjectTheme'); ?> - <?php echo  get_bloginfo('name'); ?>
                            </div>

                            <div class="box_content">
                                <br/><br/>
                                <?php
                                    echo sprintf(__('Sorry, that user does not seem to exist in our database. Perhaps you have the wrong username or e-mail address? <a href="%s">Try again</a>.','ProjectTheme'), 'wp-login.php?action=lostpassword');
                                ?>

                                <br/><br/>
                                &nbsp;

                            </div>
                        </div>
                    </div>

                    <?php

                    get_footer();
                    die();
                }

                do_action('retreive_password', $user_login);  // Misspelled and deprecated.
                do_action('retrieve_password', $user_login);

                // Generate something random for a password... md5'ing current time with a rand salt
                $key = substr( md5( uniqid( current_time('timestamp',0) ) ), 0, 50);
                // now insert the new pass md5'd into the db
                $wpdb->query("UPDATE $wpdb->users SET user_activation_key = '$key' WHERE user_login = '$user_login'");

                // $message = __('Someone has asked to reset the password for the following site and username.','ProjectTheme') . "\r\n\r\n";
                // $message .= get_option('url') . "\r\n\r\n";
                // $message .= sprintf(__('Username: %s','ProjectTheme'), $user_login) . "\r\n\r\n";
                // $message .= __('To reset your password visit the following address, otherwise just ignore this email and nothing will happen.'
                // ,'ProjectTheme') . "\r\n\r\n";
                // $message .= get_option('url') . "/wp-login.php?action=resetpass&key=$key\r\n";

                // $m = ProjectTheme_send_email($user_email, sprintf(__('[%s] Password Reset','ProjectTheme'), get_option('blogname')), $message);

                echo get_option("jk_login_after_head_html");

                echo "<div id=\"login\">\n";
                    if ($m == false) {
                        echo "<h1>".__("There Was a Problem",'ProjectTheme')."</h1>";
                            echo '<p>' . __('The e-mail could not be sent.','ProjectTheme') . "<br />\n";
                        echo  __('Possible reason: your host may have disabled the mail() function...','ProjectTheme') . "</p>";
                    } else {
                        echo "<h1>Success!</h1>";
                            echo '<p>' .  sprintf(__("The e-mail was sent successfully to %s's e-mail address.",'ProjectTheme'), $user_login) . '<br />';
                            echo  "<a href='wp-login.php' title='" . __('Check your e-mail first, of course','ProjectTheme') . "'>" .
                            __('Click here to login!','ProjectTheme') . '</a></p>';
                    }
                echo "</div>\n";


                echo '</div></div></div>';
                get_footer();

                die();
                break;

            //reset password
            case 'rp' :

                get_header();

                echo '<div class="my_box3">
                <div class="padd10">';


                echo "          <div id=\"login\">\n";
                // Generate something random for a password... md5'ing current time with a rand salt
                $key = preg_replace('/a-z0-9/i', '', $_GET['key']);
                if ( empty($key) )
                {
                _e('<h1>Problem</h1>','ProjectTheme');
                    _e('Sorry, that key does not appear to be valid.','ProjectTheme');
                echo "          </div>\n";


                echo '</div></td></tr></table></div></div>';
                get_footer();

                die();
                }
                $user = $wpdb->get_row("SELECT * FROM $wpdb->users WHERE user_activation_key = '$key'");
                if ( !$user )
                {
                _e('<h1>Problem</h1>','ProjectTheme');
                    _e('Sorry, that key does not appear to be valid.','ProjectTheme');
                echo "          </div>\n";


                echo '</div></div>';
                get_footer();

                die();
                }

                do_action('password_reset');

                $new_pass = substr( md5( uniqid( current_time('timestamp',0) ) ), 0, 7);
                $wpdb->query("UPDATE $wpdb->users SET user_pass = MD5('$new_pass'), user_activation_key = '' WHERE user_login = '$user->user_login'");

                wp_cache_delete($user->ID, 'users');
                wp_cache_delete($user->user_login, 'userlogins');

                ProjectTheme_send_mail_on_new_password($user->user_email,$new_pass);
                wp_redirect(home_url()."/wp-login.php?new_password=confirm");

                get_footer();


                die();
                break;

            //login //default action
            case 'login' :
            default:
                //check credentials - 99% of this is identical to the normal wordpress login sequence as of 2.0.4
                //Any differences will be noted with end of line comments.
                $user_login = '';
                $user_pass = '';
                $using_cookie = false;
                $secure_cookie = '';

                if ( !empty($_POST['log']) && !force_ssl_admin() ) {
                    $user_name = sanitize_user($_POST['log']);
                    if ( $user = get_user_by('login', $user_name) ) {
                        if ( get_user_option('use_ssl', $user->ID) ) {
                            $secure_cookie = true;
                            force_ssl_admin(true);
                        }
                    }
                }
                //------------------------------
                if ( empty( $_GET['redirect_to'] ) ) {
                    $redirect_to = get_permalink(get_option('ProjectTheme_my_account_page_id'));
                    if(empty($redirect_to))
                        $redirect_to = admin_url();
                } else {
                    $redirect_to = $_GET['redirect_to'];
                }

                if(isset($_SESSION['redirect_me_back'])) $redirect_to = $_SESSION['redirect_me_back'];

                //------------------------------------------

                $reauth = empty($_REQUEST['reauth']) ? false : true;
                $user = wp_signon( '', $secure_cookie );

                // if ( empty( $_COOKIE[ LOGGED_IN_COOKIE ] ) ) {
                //        if ( headers_sent() ) {
                //         $user = new WP_Error( 'test_cookie', sprintf( __( '<strong>ERROR</strong>: Cookies are blocked due to unexpected output. For help, please see <a href="%1$s">this documentation</a> or try the <a href="%2$s">support forums</a>.','ProjectTheme' ),
                //                 'https://codex.wordpress.org/Cookies' ,   'https://wordpress.org/support/'   ) );
                //     } elseif ( isset( $_POST['testcookie'] ) && empty( $_COOKIE[ TEST_COOKIE ] ) ) {
                //         // If cookies are disabled we can't log in even with a valid user+pass
                //         $user = new WP_Error( 'test_cookie', sprintf( __( '<strong>ERROR</strong>: Cookies are blocked or not supported by your browser. You must <a href="%s">enable cookies</a> to use WordPress.' ,'ProjectTheme'),
                //                 'https://codex.wordpress.org/Cookies'   ) );
                //     }
                // }

                //--------------------------------------------

                $requested_redirect_to = isset( $_REQUEST['redirect_to'] ) ? $_REQUEST['redirect_to'] : '';
                $redirect_to = apply_filters( 'login_redirect', $redirect_to, $requested_redirect_to, $user );

                if ( !is_wp_error($user) && !$reauth ) {
                    wp_safe_redirect($redirect_to);
                }

                global $title_me;
                $title_me = 'Login';
                add_filter( 'wp_title', 'ProjectTheme_project_pages_title', 10, 1 );

                get_header();
            ?>

            <div id="register_wrapper">
                <div id="main" class="wrapper-register">
                    <div class="padd10">
                        <div class="my_box4">
                            <h3 class="h3-name"><?php echo get_the_title(); ?></h3>
                            <?php echo do_shortcode('[TheChamp-Login]') ?>
                                <div class="or-separator"><?php _e('or', 'ProjectTheme'); ?></div>
                                <div class="box_content2">
                                    <?php
                                        if(isset($_GET['checkemail']) && $_GET['checkemail'] == "confirm"):
                                            ?>

                                            <div class="check-email-div">
                                                <div class="padd10">
                                                    <?php _e('We have sent a confirmation message to your email address.<br/>
                                                    Please follow the instructions in the email and get back to this page.','ProjectTheme'); ?>
                                                </div>
                                            </div>
                                            <br>
                                        <?php
                                        endif;

                                        if(isset($_GET['new_password']) && $_GET['new_password'] == "confirm"):
                                            ?>

                                            <div class="check-email-div">
                                                <div class="padd10">
                                                    <?php _e('We have sent a confirmation message to your new password.<br/>
                                                    Please follow the instructions in the email and get back to this page.','ProjectTheme'); ?>
                                                </div>
                                            </div>
                                            <br>
                                        <?php
                                        endif;
                                        $errors = $user;
                                        $errors = apply_filters( 'wp_login_errors', $errors, $redirect_to );

                                        if ( empty($errors) )
                                            $errors = new WP_Error();

                                        ?>

                                        <?php
                                        //global $error;
                                        $wp_error = $errors;

                                        if ( !empty( $error ) ) {
                                            $wp_error->add('error', $error);
                                            unset($error);
                                        }

                                        if ( $wp_error->get_error_code() ) {
                                            $errors = '';
                                            $messages = '';
                                            foreach ( $wp_error->get_error_codes() as $code ) {
                                                $severity = $wp_error->get_error_data( $code );
                                                foreach ( $wp_error->get_error_messages( $code ) as $error_message ) {
                                                    if ( 'message' == $severity )
                                                        $messages .= '	' . $error_message . "<br />\n";
                                                    else
                                                        $errors .= '	' . $error_message . "<br />\n";
                                                }
                                                foreach ( $wp_error->get_error_messages( $code ) as $error_message ) {
                                                  $error_code .= $code;
                                                }
                                            }
                                            if ( ! empty( $errors ) ) {
                                                /**
                                                 * Filter the error messages displayed above the login form.
                                                 *
                                                 * @since 2.1.0
                                                 *
                                                 * @param string $errors Login error message.
                                                 */
                                                 $length = strlen(apply_filters( 'login_messages', $errors ));
                                                 //empty_usernameempty_password
                                                 //echo '<div class="error">' . apply_filters( 'login_errors', $errors ) . "</div>\n";
                                                 if ($error_code != 'empty_usernameempty_password') {
                                                   echo '<div class="error">' . apply_filters( 'login_errors', $errors ) . "</div>\n";
                                                 }
                                            }
                                            if ( ! empty( $messages ) ) {
                                                /**
                                                 * Filter instructional messages displayed above the login form.
                                                 *
                                                 * @since 2.5.0
                                                 *
                                                 * @param string $messages Login messages.
                                                 */
                                                echo '<p class="message">' . apply_filters( 'login_messages', $messages ) . "</p>\n";
                                            }
                                        }

                                    ?>
                                    <div class="login-submit-form">

                                    <form name="loginform" id="loginform" action="<?php echo esc_url( site_url( 'wp-login.php', 'login_post' ) ); ?>" method="post">
                                        <p>
                                            <input class="do_input_new full_wdth_me" type="text" name="log" id="log" placeholder="<?php _e('Type your username','ProjectTheme'); ?>" value="<?php echo esc_html(stripslashes($user_login), 1); ?>" size="30"  />
                                        </p>

                                        <p>
                                            <input class="do_input_new full_wdth_me" type="password" name="pwd" id="login_password" placeholder="<?php _e('Type your password','ProjectTheme'); ?>"  value="" size="30"  />
                                        </p>

                                        <p>
                                            <input class="" name="rememberme" type="checkbox" id="rememberme" value="true" tabindex="3" />
                                        <?php _e('Keep me logged in','ProjectTheme'); ?>
                                        </p>

                                        <?php do_action('login_form'); ?>

                                        <p><label>&nbsp;</label>
                                            <input type="submit" class="submit_bottom" name="wp-submit" id="submits" value="<?php _e('Sign in','ProjectTheme'); ?>" tabindex="4" />
                                            <input type="hidden" name="redirect_to" value="<?php echo esc_html($redirect_to); ?>" />
                                        </p>

                                    </form>
                                    <div class="clear10"></div>
                                    <div class="clear10"></div>
                                    <div style="width: 100%; text-align:center;">
                                        <h4> <?php echo _e("Do not have an account","ProjectTheme");?></h4>
                                        <div class="clear10"></div>
                                        <div class="clear10"></div>

                                        <a href="<?php echo site_url().'/wp-login.php?action=register'?>" class="go_back_btn" style="margin-top:10px;"><?php echo _e("Register Here","ProjectTheme");?></a>
                                    </div>

                                    <div class="alrd-register-login">
                                        <?php echo _e("Did you forget your password ? Recover it");?>
                                        <a href="<?php echo site_url().'/wp-login.php?action=lostpassword'?>" class='link-man-1'>
                                            <?php _e("here","ProjectTheme");?>
                                        </a>.
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
        }
    return ob_get_clean();
}
add_shortcode('login_shortcode','login_sh');

//[reg_shortcode]
function register_sh() {
	ob_start();
	?> <?php
        global $wpdb, $wp_query;

        if (!is_array($wp_query->query_vars))
            $wp_query->query_vars = array();
        ?>
        <?php
        switch( $_REQUEST["action"] ){
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
                                        <p><?php printf(__('Username: %s','ProjectTheme'), "<strong>" . esc_html($user_login) . "</strong>") ?><br />
                                        <?php printf(__('Password: %s','ProjectTheme'), '<strong>' . __('emailed to you','ProjectTheme') . '</strong>') ?> <br />
                                        <?php printf(__('E-mail: %s','ProjectTheme'), "<strong>" . esc_html($user_email) . "</strong>") ?><br /><br />
                                        <?php _e("Please check your <strong>Junk Mail</strong> if your account information does not appear within 5 minutes.",'ProjectTheme'); ?>
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
                                    <?php echo do_shortcode('[TheChamp-Login]') ?>
                                    <div class="or-separator"><?php _e('or', 'ProjectTheme'); ?></div>
                                    <div class="box_content">
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
                                                                <div class="row" >
                                                                        <label for="user_tp_contractor" style="display: none;">
                                                                                <input class="pph-custom-input"
                                                                                        tabindex="6"
                                                                                        type="radio"
                                                                                        name="user_tp"
                                                                                        id="user_tp_contractor"
                                                                                        value="business_owner"
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

                            <p><?php _e('User registration is currently not allowed.','ProjectTheme') ?><br />
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
} add_shortcode( 'reg_shortcode', 'register_sh' );

function show_invitation_for_registration() {
    ob_start();
    global $current_user;
    $user_id = $current_user->ID; ?>
    
    <!-- <button type='button' class = "my-buttons" id = "invitation_button_id"> <?php _e('Invite to GreySell', 'ProjectTheme');?> </button>
    <script>
        $ = jQuery;
        $(document).ready( function() {
            $("#invitation_button_id").click( function() {
                $("#invitation_form_id").toggle();
            });
        });
    </script> -->
    <div id = "invitation_form_id">
        <form action="" method="post">
            <input type="text" name = "mail" class = "invitation_form_email" placeholder="Email"/>
            <input type="submit" class = "invitation_form_button" value="<?php _e('Send', 'ProjectTheme');?>" />
            <input type="hidden" name="button_pressed" value="1" />
        </form>
    </div>
    <?php

    if(isset($_POST['button_pressed']))
    {
        $invitation_receiver = $_POST['mail'];
        $invitation_key = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(32/strlen($x)) )),1,32);
        update_option($invitation_key, $user_id);
        ProjectTheme_send_email_invitation_for_registration($user_id, $invitation_receiver, $invitation_key);

        ?> 
        <div class = "my_box3 invitation_sent">
            <?php _e('Your invitation was sent.', 'ProjectTheme'); ?>
        </div> <?php
    }

    ?><?php
    return ob_get_clean();
} add_shortcode('show_invitation_for_registration_shortcode', 'show_invitation_for_registration');


/* Shortcode to be user as register form in the Invitation Promotion Page */
function register_for_promotion_page($atts) {
    ob_start();
	?> <?php

        $params = shortcode_atts(array(
            'invitation_key' => ''
        ), $atts);

        $invitation_key = $params["invitation_key"];
        $user_id = get_option($invitation_key);
        
        global $wpdb, $wp_query;

        if (!is_array($wp_query->query_vars))
            $wp_query->query_vars = array();
        
        switch( $_REQUEST["action"] ){
            case 'registerfrominvitation':
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
                                        <?php _e('Now you can receive your gifts.', 'ProjectTheme'); ?>
                                    </div>
                                    <div class="padd10">
                                        <p><?php printf(__('Username: %s','ProjectTheme'), "<strong>" . esc_html($user_login) . "</strong>") ?><br />
                                        <?php printf(__('Password: %s','ProjectTheme'), '<strong>' . __('emailed to you','ProjectTheme') . '</strong>') ?> <br />
                                        <?php printf(__('E-mail: %s','ProjectTheme'), "<strong>" . esc_html($user_email) . "</strong>") ?><br /><br />
                                        <?php _e("Please check your <strong>Junk Mail</strong> if your account information does not appear within 5 minutes.",'ProjectTheme'); ?>
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

                    /* Now that the registration is complete each User receives its gifts */
                    if(get_option('projectTheme_enable_invitation_for_registration') == "yes") {
                        giveInvitationGifts($user_id, $errors);
                    }
                
                    die();
                    break;
                }//continued from the error check above

            default:
                global $title_me;
                $title_me = 'Register to receive your gifts';
                add_filter( 'wp_title', 'ProjectTheme_project_pages_title', 10, 1 );
                get_header();
                ?>

                <div id="register_wrapper">
                    <div id="main" class="wrapper-register">
                        <div class="padd10">
                            <div class = "my_box3"> 
                                <?php 
                                $user_id = get_option($invitation_key);
                                $user = get_userdata($user_id);
                            
                                printf(__('User %s has invited you to join GreySell.', ''), $user->user_login);  ?>
                            </div>
                            <div class = "my_box3">
                                <div class = "how-it-works-invitation-title">
                                    <? _e('How It Works', 'ProjectTheme'); ?>
                                </div>

                                <div class = "how-it-works-invitation-columns"> 
                                    <div class = "how-it-works-invitation-col">
                                        <?php _e('You register either as a Provider or a Contractor.', 'ProjectTheme'); ?>
                                    </div>
                                    <div class = "how-it-works-invitation-col">
                                        <?php _e('You and your friend who invited you receive your gifts depending on your type of User.', 'ProjectTheme'); ?>
                                    </div>
                                    <div class = "how-it-works-invitation-col">
                                        <?php _e('Invite your friends to receive more gifts.', 'ProjectTheme'); ?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="my_box3">
                                <div class="padd10">
                                    <h3 class="h3-name"><?php echo get_the_title(); ?></h3>
                                    <?php //echo do_shortcode('[TheChamp-Login]') ?>
                                    <!-- <div class="or-separator"><?php //_e('or', 'ProjectTheme'); ?></div> -->
                                    <div class="box_content">
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
                                                <form method="post" id="registerform" action="<?php echo esc_url( site_url('εγγραφή-από-πρόσκληση?action=registerfrominvitation&invitation_key='.$invitation_key, 'login_post') ); ?>">
                                                    <input type="hidden" name="action" value="registerfrominvitation" />
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
                                                                <div class="row" >
                                                                    <label for="user_tp_contractor">
                                                                            <input class="pph-custom-input"
                                                                            tabindex="6"
                                                                            type="radio"
                                                                            name="user_tp"
                                                                            id="user_tp_contractor"
                                                                            value="business_owner"
                                                                            checked="checked">
                                                                    <?php _e('Contractor', 'ProjectTheme'); ?>
                                                                    </label>

                                                                    <label for="user_tp_contractor">
                                                                        <input class="pph-custom-input"
                                                                        tabindex="6"
                                                                        type="radio"
                                                                        name="user_tp"
                                                                        id="user_tp_provider"
                                                                        value="service_provider">
                                                                    <?php _e('Provider', 'ProjectTheme'); ?>
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

                            <p><?php _e('User registration is currently not allowed.','ProjectTheme') ?><br />
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
} add_shortcode('register_for_promotion_page_shortcode', 'register_for_promotion_page');
?>
