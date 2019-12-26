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
 		
if(!is_user_logged_in()) { wp_redirect(home_url()."/wp-login.php"); exit; }
		
global $wpdb, $current_user;
$current_user = wp_get_current_user();
    

$id = $wp_query->query_vars['rid'];
$s = "select * from ".$wpdb->prefix."project_ratings where id='$id'";
$result = $wpdb->get_results($s);

$row = $result[0];
$pid = $row->pid;
$user = get_userdata($row->touser);
$post_pr = get_post($row->pid);

$my_uid = $row->touser;

//-------------------------

$fromuser = $row->fromuser;
if($current_user->ID != $fromuser) { wp_redirect(home_url()); exit; }

//-------------------------

get_header();
do_action('feedback_style');
?> 
  
<!-- ReviewForm -->
<?php 
    $nok = 1;
    if (isset($_POST['review_submission'])){  
        $nok = 0; 
        //Step1
        $consistency_grade = $_POST['consistency_grade'];
        $communication_grade = $_POST['communication_grade'];
        $overall_grade = floor(($consistency_grade + $communication_grade)/2);
        //Step2
        $review_comments = nl2br(strip_tags($_POST['review_comments']));
        //Step3
        $personal_review = nl2br(strip_tags($_POST['personal_review']));
        //Step4
        $work_again = $_POST['work_again'];
        $pay_method = $_POST['pay_method'];
        //Datetime rate was made
        $datemade = current_time('timestamp',0);
        // Write Project Rating to db
        $s = "update ".$wpdb->prefix."project_ratings set review_comments='$review_comments', personal_review='$personal_review',
        consistency_grade='$consistency_grade',
        communication_grade='$communication_grade',
        datemade='$datemade',
        work_again='$work_again',
        pay_method='$pay_method',
        awarded='1',
        overall_grade = '$overall_grade'
        where id='$id'";
        $wpdb->query($s);

        //Update user rating
        $cool_user_rating = get_user_meta($my_uid, 'cool_user_rating', true);
        if(empty($cool_user_rating)) update_user_meta($my_uid, 'cool_user_rating', 0);
        
        //---------------------------
        
        $cool_user_rating = get_user_meta($my_uid, 'cool_user_rating', true);
        
        global $wpdb;
        $s = "select * from ".$wpdb->prefix."project_ratings where touser='$my_uid' AND awarded='1'";
        $r = $wpdb->get_results($s);
        $i = 0; $s = 0;
            
        if(count($r) > 0) {
            foreach($r as $row)  {
                $i++;
                $s = $s + ($row->consistency_grade+ $row->communication_grade);
            }

            $rating2 = round(($s/$i)/2, 2);
            update_user_meta($my_uid, 'cool_user_rating', $rating2);
        }
        ?>
        <div id="success">
            <div class="icon icon--order-success svg">
                <svg xmlns="http://www.w3.org/2000/svg" width="72px" height="72px">
                    <g fill="none" stroke="#8EC343" stroke-width="2">
                        <circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
                        <path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
                    </g>
                </svg>
            </div>
            <h4>
                <span>Σε ευχαριστούμε πολύ για την αξιολόγησή σου!</span>
            </h4>
            <small>Μας βοηθάς να διατηρούμε την ποιότητα της κοινότητας της GreySell ψηλά.</small>
        </div>
        <?php
        ProjectTheme_send_email_on_rated_user($pid, $my_uid);
        ProjectTheme_send_email_on_admin_approve_rating($pid,$my_uid);
    }
?>

<?php if ($nok == 1){?>
    <main>
        <div id="form_container">
            <div class="row">
                <div class="col-lg-5">
                    <div id="left_form">
                        <figure><img src="<?php get_stylesheet_directory()?>wp-content/themes/project-theme-child/images/feedback_img/review_bg.svg" alt=""></figure>
                        <h2 style="color: #dd5555"><?php printf(__("Project: %s",'ProjectTheme'), $post_pr->post_title ) ;?></h2>
                        <h2>Αξιολογήσεις</h2>
                        <p>Παρακαλούμε προτίμησε να συμπεριλάβεις στοιχεία τις συνεργασίας που σου έκαναν θετική ή αρνητική εντύπωση 
                        και απόφυγε τις συγκρίσεις με άλλες συνεργασίες ή την αναφορά σε στοιχεία που δεν μπορούν να διασταυρωθούν. 
                        Χρησιμοποίησε το προσωπικό σημείωμα για να δώσεις μια συμβουλή βελτίωσης στον άλλον χρήστη ή ένα ευχαριστήριο μήνυμα!</p>
                        <!-- <a href="#0" id="more_info" class="how_to" data-toggle="modal" data-target="#more-info"></a> -->
                    </div>
                </div>
                <div class="col-lg-7">
                    <div id="wizard_container">
                        <div id="top-wizard">
                            <div id="progressbar"></div>
                        </div>
                        <!-- /top-wizard -->
                        <form method="post">
                            <input id="website" name="website" type="text" value="">
                            <div id="middle-wizard">
                                <div class="step">
                                    <h3 class="main_question"><strong>1/4</strong>Αξιολόγηση συνεργασίας</h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group clearfix">
                                                <label class="rating_type">Συνέπεια</label>
                                                <span class="rating">
                                                <input type="radio" class="required rating-input" id="rating-input-1-5" name="consistency_grade" value="5"><label for="rating-input-1-5" class="rating-star"></label>
                                                <input type="radio" class="required rating-input" id="rating-input-1-4" name="consistency_grade" value="4"><label for="rating-input-1-4" class="rating-star"></label>
                                                <input type="radio" class="required rating-input" id="rating-input-1-3" name="consistency_grade" value="3"><label for="rating-input-1-3" class="rating-star"></label>
                                                <input type="radio" class="required rating-input" id="rating-input-1-2" name="consistency_grade" value="2"><label for="rating-input-1-2" class="rating-star"></label>
                                                <input type="radio" class="required rating-input" id="rating-input-1-1" name="consistency_grade" value="1"><label for="rating-input-1-1" class="rating-star"></label>
                                                </span>
                                            </div>
                                            <div class="form-group clearfix">
                                                <label class="rating_type">Επικοινωνία</label>
                                                <span class="rating">
                                                <input type="radio" class="required rating-input" id="rating-input-2-5" name="communication_grade" value="5"><label for="rating-input-2-5" class="rating-star"></label>
                                                <input type="radio" class="required rating-input" id="rating-input-2-4" name="communication_grade" value="4"><label for="rating-input-2-4" class="rating-star"></label>
                                                <input type="radio" class="required rating-input" id="rating-input-2-3" name="communication_grade" value="3"><label for="rating-input-2-3" class="rating-star"></label>
                                                <input type="radio" class="required rating-input" id="rating-input-2-2" name="communication_grade" value="2"><label for="rating-input-2-2" class="rating-star"></label>
                                                <input type="radio" class="required rating-input" id="rating-input-2-1" name="communication_grade" value="1"><label for="rating-input-2-1" class="rating-star"></label>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /row -->
                                    <div id="bottom-wizard">
                                        <button type="button" name="forward" class="forward">Επόμενο</button>
                                    </div>
                                </div>
                                <!-- /step -->
                                <div class="step">
                                    <h3 class="main_question"><strong>2/4</strong>Σχόλια:</h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea name="review_comments" class="form-control" style="height:180px;" placeholder="Περιγράψε μας την συνεργασία σας"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /row -->
                                    <div id="bottom-wizard">
                                        <button type="button" name="backward" class="backward">Προηγούμενο</button>
                                        <button type="button" name="forward" class="forward">Επόμενο</button>
                                    </div>
                                </div>
                                <!-- /step -->
                                <div class="step">
                                    <h3 class="main_question"><strong>3/4</strong>Προσωπικό σημείωμα:</h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea name="personal_review" class="form-control" style="height:180px;" placeholder="Συμπλήρωσε ενα προσωπικό σημείωμα. Αυτό θα σταλεί μόνο στον χρήστη που συνεργαστήκατε."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /row -->
                                    <div id="bottom-wizard">
                                        <button type="button" name="backward" class="backward">Προηγούμενο</button>
                                        <button type="button" name="forward" class="forward">Επόμενο</button>
                                    </div>
                                </div>
                                <!-- /step -->
                                <div class="submit step">
                                    <h3 class="main_question"><strong>4/4</strong>Και κάτι ακόμα…</h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                <h3>Θα συνεργαζόσουν ξανά με αυτόν τον χρήστη;</h3>
                                                <div class="form-group radio_input">
                                                    <label><input type="radio" value="Yes" name="work_again" class="icheck">Ναι</label>
                                                    <label><input type="radio" value="No" name="work_again" class="icheck">Όχι</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="col-lg-12">
                                                <h3>Πως ολοκληρώθηκε η εξόφληση;</h3>
                                                <div class="form-group radio_input">
                                                    <label><input type="radio" value="cash" name="pay_method" class="icheck">Μετρητά</label>
                                                    <label><input type="radio" value="card" name="pay_method" class="icheck">Πληρωμή με κάρτα</label>
                                                    <label><input type="radio" value="bank-paypal" name="pay_method" class="icheck">Πληρωμή μέσω τραπέζης/Paypal</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /row -->
                                    <div id="bottom-wizard">
                                        <button type="button" name="backward" class="backward">Προηγούμενο </button>
                                        <input type="submit" name="review_submission" class="submit" value="Υποβολή"/>
                                    </div>
                                </div>
                            </div>
                            <!-- /middle-wizard -->
                        </form>
                    </div>
                    <!-- /Wizard container -->
                </div>
            </div>
            <!-- /Row -->
        </div>
        <!-- /Form_container -->
    </main>
<?php }?>

<div class="cd-overlay-nav">
    <span></span>
</div>
<!-- cd-overlay-nav -->

<div class="cd-overlay-content">
    <span></span>
</div>
<!-- cd-overlay-content -->

<!-- Modal info -->
<div class="modal fade" id="more-info" tabindex="-1" role="dialog" aria-labelledby="more-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Το σύστημα αξιολογήσεων της GreySell προσφέρει εναν αξιόπιστο τρόπο για να συνεχίσουμε να χτίζουμε την κοινότητα που οραματιζόμαστε. Το σύστημα μας προσφέρει ασφαλείς και αξιόπιστες αξιολογήσεις οι οποίες δημοσιεύονται ταυτόχρονα και για τους δύο χρήστες, για την προστασία τους και για την αποφυγή ψευδών αξιολογήσεων.

                        Μέσω του προσωπικού μηνύματος μπορείς επίσης να δώσεις feedback στον συνεργάτη σου ακόμα και μετά από μία συνεργασία που δεν πήγε καλά, χωρίς αυτό να δημιουργήσει πρόβλημα στις μελλοντικές συνεργασίες του.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn_1" data-dismiss="modal">Κλείσιμο</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!--/ReviewForm-->
<?php get_footer(); ?>