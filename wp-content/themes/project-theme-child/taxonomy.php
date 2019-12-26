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

function projectTheme_posts_where3( $where ) {
    global $wpdb, $term;
    $term = trim($term);
    $term1 = explode(" ",$term);
    $xl = '';

    foreach($term1 as $tt) {
        $xl .= " AND ({$wpdb->posts}.post_title LIKE '%$tt%' OR {$wpdb->posts}.post_content LIKE '%$tt%')";
    }
    $where .= " AND (1=1 $xl )";
    return $where;
}

function projectTheme_posts_join3($join) {
    global $wp_query, $wpdb;

    $join .= " LEFT JOIN (
            SELECT post_id, meta_value as featured_due
            FROM $wpdb->postmeta
            WHERE meta_key =  'featured' ) AS DD
            ON $wpdb->posts.ID = DD.post_id ";

    $meta_key = $_GET['meta_key'];

    if(!empty($meta_key)) {
            $join .= " LEFT JOIN (
            SELECT post_id, meta_value as meta_key_due
            FROM $wpdb->postmeta
            WHERE meta_key =  '$meta_key' ) AS BB
            ON $wpdb->posts.ID = BB.post_id ";
    }
    return $join;
}

//------------------------------------------------------

function projectTheme_posts_orderby3( $orderby ){
    global $wpdb; $meta_key = $_GET['meta_key'];
    $order = $_GET['order'];

    if(!empty($meta_key)) {
        $bbs = "meta_key_due+0 $order ,";
    }

    $orderby = " featured_due+0 desc , ".$bbs." $wpdb->posts.post_date desc ";

    //--------------------------------------

    if($_GET['orderby'] == "title") {
        $orderby = " featured_due+0 desc , $wpdb->posts.post_title ".$_GET['order']." ";
    }

    return $orderby;
}

if(isset($_GET['order'])) $order = $_GET['order'];
else $order = "DESC";

if(isset($_GET['orderby'])) $orderby = $_GET['orderby'];
else $orderby = "date";

if(isset($_GET['meta_key'])) $meta_key = $_GET['meta_key'];
else $meta_key = "";


if(!empty($_GET['budgets'])) {
    $price_q = array(
        'key' => 'budgets',
        'value' => $_GET['budgets'],
        'compare' => '='
    );
}

$closed = array(
    'key' => 'closed',
    'value' => "0",
    'compare' => '='
);

//------------

global $term;
$term = trim($_GET['term']);

if(isset($_GET['term'])) {
    add_filter( 'posts_where' , 'projectTheme_posts_where3' );
}

do_action('ProjectTheme_adv_search_before_search');
add_filter('posts_join', 'projectTheme_posts_join3');
add_filter('posts_orderby', 'projectTheme_posts_orderby3' );

$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
$term_title = $term->name;

if(!empty($term_title)) $category = array(
    'taxonomy' => 'project_cat',
    'field' => 'slug',
    'terms' => $term->slug
);
else $category = '';
$args = array( 'post_type' => 'project','meta_query' => array($price_q,$closed),'meta_key' => $meta_key,'orderby'=>$orderby,
                'tax_query' => array($category)
);

$the_query = new WP_Query( $args );

get_header();

?>

<!-- ########## -->

<div id="main_wrapper">
		<div id="main" class="wrapper"> 
        <h2> <?php echo $term_title;?> </h2>
        <div id="right-sidebar2" class="float_left col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <li class="">
                <div class="post">
                    <div class="padd10">
                        <h3 class="widget-title">
                            <?php _e('Filter Options','ProjectTheme'); ?>
                        </h3>
                        <form method="get">
                            <ul id="medas">

                                <li>
                                <h2><?php _e('Pricing Range',"ProjectTheme"); ?>:</h2>
                                <p><?php echo ProjecTheme_get_budgets_dropdown($_GET['budgets'], 'do_input_new2', 1); ?></p>
                                </li>

                                <li>
                                <h2></h2>
                                <p><input class="submit_bottom" type="submit" value="<?php _e("Refine Search","ProjectTheme"); ?>" name="ref-search" class="big-search-submit2" /></p>
                                </li>
                            </ul>
                        </form>

                        <div class="clear10"></div>

                        <div class = "order_by">
                            <?php
                                $ge = 'order='.($_GET['order'] == 'ASC' ? "DESC" : "ASC").'&meta_key=budgets&orderby=meta_value_num';
                                foreach($_GET as $key => $value){
                                    if($key != 'meta_key' && $key != 'orderby' && $key != 'order'){
                                        $ge .= '&'.$key."=".htmlentities($value);
                                    }
                                }

                                //------------------------

                                $ge2 = 'order='.($_GET['order'] == 'ASC' ? "DESC" : "ASC").'&orderby=title';
                                foreach($_GET as $key => $value) {
                                    if( $key != 'orderby' && $key != 'order') {
                                        $ge2 .= '&'.$key."=".htmlentities($value);
                                    }
                                }
                                
                                //------------------------

                                $ge3 = 'order='.($_GET['order'] == 'ASC' ? "DESC" : "ASC").'&meta_key=views&orderby=meta_value_num';
                                foreach($_GET as $key => $value) {
                                    if($key != 'meta_key' && $key != 'orderby' && $key != 'order') {
                                        $ge3 .= '&'.$key."=".htmlentities($value);
                                    }
                                }
                            ?>
                            
                            <?php _e("Order by:","ProjectTheme");?>

                            <a href="<?php echo "?"; echo htmlentities($ge); ?>"><?php _e("Price","ProjectTheme"); ?></a> |
                            <a href="<?php echo "?"; echo htmlentities($ge2); ?>"><?php _e("Name","ProjectTheme"); ?></a> |
                            <a href="<?php echo "?"; echo htmlentities($ge3); ?>"><?php _e("Visits","ProjectTheme"); ?></a>

                        </div>
                    </div>
                </div>
            </li>
            <?php dynamic_sidebar( 'other-page-area' ); ?>
    </div>

        <div id="content2" class="float_right col-xs-12 col-sm-8 col-md-8 col-lg-8" >
            <?php
                if($the_query->have_posts()):
                    while ( $the_query->have_posts() ) : $the_query->the_post();
                        projectTheme_get_post($post, $i);
                    endwhile;

                    if(function_exists('wp_pagenavi')):
                        wp_pagenavi();
                    endif;

                else:
                    echo '<div class="my_box3">';
                        echo _e('<h4>This category does not have any project posted yet.</h4></br>',"ProjectTheme");
                        echo _e('<h5>Check all active projects at GreyCell</h5></br>',"ProjectTheme");
                        echo '<div class = "search-project-button-container">';
                            ?>
                            <a href="<?php echo _e("https://grey-cell.co.uk/advanced-search/")?>" 
                            class="search-project-button go_back_btn">
                                <?php _e("Search Project","ProjectTheme")?>
                            </a>

                        <?php
                    echo '</div>';
                echo '</div>';
                
                endif;
                // Reset Post Data
                wp_reset_postdata();
                
            ?>
        </div>
        <div id="right-sidebar">
            <ul class="xoxo">
                <?php dynamic_sidebar( 'other-page-area' ); ?>
            </ul>
        </div>
    </div>
</div>
 

<?php
	get_footer();
?>