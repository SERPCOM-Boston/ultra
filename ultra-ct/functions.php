<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');

function attachment_search( $query ) {
    if ( $query->is_search ) {
       $query->set( 'post_type', array( 'post', 'attachment','upg' ) );
       $query->set( 'post_status', array( 'publish', 'inherit' ) );
    }
 
   return $query;
}

add_filter( 'pre_get_posts', 'attachment_search' );

add_filter( 'posts_join', 'custom_posts_join', 10, 2 );
/**
 * Callback for WordPress 'posts_join' filter.'
 *
 * @global $wpdb
 *
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/posts_join
 *
 * @param string $join The sql JOIN clause.
 * @param WP_Query $wp_query The current WP_Query instance.
 *
 * @return string $join The sql JOIN clause.
 */
function custom_posts_join( $join, $query ) {

    global $wpdb;

    if ( is_main_query() && is_search() ) {

        $join .= "
        LEFT JOIN
        (
            {$wpdb->term_relationships}
            INNER JOIN
                {$wpdb->term_taxonomy} ON {$wpdb->term_taxonomy}.term_taxonomy_id = {$wpdb->term_relationships}.term_taxonomy_id
            INNER JOIN
                {$wpdb->terms} ON {$wpdb->terms}.term_id = {$wpdb->term_taxonomy}.term_id
        )
        ON {$wpdb->posts}.ID = {$wpdb->term_relationships}.object_id ";

    }

    return $join;

}

add_filter( 'posts_where', 'custom_posts_where', 10, 2 );
/**
 * Callback for WordPress 'posts_where' filter.
 *
 * Modify the where clause to include searches against a WordPress taxonomy.
 *
 * @global $wpdb
 *
 * @see https://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where
 *
 * @param string $where The where clause.
 * @param WP_Query $query The current WP_Query.
 *
 * @return string The where clause.
 */
function custom_posts_where( $where, $query ) {

    global $wpdb;

    if ( is_main_query() && is_search() ) {

        // get additional where clause for the user
        $user_where = custom_get_user_posts_where();

        $where .= " OR (
                        {$wpdb->term_taxonomy}.taxonomy IN( 'category', 'post_tag' )
                        AND
                        {$wpdb->terms}.name LIKE '%" . esc_sql( get_query_var( 's' ) ) . "%'
                        {$user_where}
                    )";

    }

    return $where;

}

/**
 * Get a where clause dependent on the current user's status.
 *
 * @global $wpdb https://codex.wordpress.org/Class_Reference/wpdb
 *
 * @uses get_current_user_id()
 * @see http://codex.wordpress.org/Function_Reference/get_current_user_id
 *
 * @return string The user where clause.
 */
function custom_get_user_posts_where() {

    global $wpdb;

    $user_id = get_current_user_id();
    $sql     = '';
    $status  = array( "'publish'" );

    if ( $user_id ) {

        $status[] = "'private'";

        $sql .= " AND {$wpdb->posts}.post_author = {$user_id}";

    }

    $sql .= " AND {$wpdb->posts}.post_status IN( " . implode( ',', $status ) . " ) ";

    return $sql;

}

add_filter( 'posts_groupby', 'custom_posts_groupby', 10, 2 );
/**
 * Callback for WordPress 'posts_groupby' filter.
 *
 * Set the GROUP BY clause to post IDs.
 *
 * @global $wpdb https://codex.wordpress.org/Class_Reference/wpdb
 *
 * @param string $groupby The GROUPBY caluse.
 * @param WP_Query $query The current WP_Query object.
 *
 * @return string The GROUPBY clause.
 */
function custom_posts_groupby( $groupby, $query ) {

    global $wpdb;

    if ( is_main_query() && is_search() ) {
        $groupby = "{$wpdb->posts}.ID";
    }

    return $groupby;

}


function pdo_db_connect($host = DB_HOST, $dbname = DB_NAME, $dbuser = DB_USER, $dbpw= DB_PASSWORD) {
	$link = new \PDO(  'mysql:host=' . $host .';dbname=' . $dbname . ';charset=utf8mb4', 
		$dbuser, 
		$dbpw,  
		array(
			\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, 
			\PDO::ATTR_PERSISTENT => false
		)
	);
	
	$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//$link->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
		
	return $link;
}
if(!isset($suitecrm_link)) $suitecrm_link = pdo_db_connect();


$app_list_strings = array('account_type_dom' => array(), 'category_list' => '', 'regions_list' => '');


function get_account_details($seo_url = false, $id = false){
	//echo getcwd();
	
	global $suitecrm_link;
	//print_r($app_list_strings);
	//echo "SEO: " . $seo_url;
	if($seo_url) {
		$handle = $suitecrm_link->prepare(
			"SELECT *
			from accounts, accounts_cstm
			WHERE id = id_c
			AND deleted = 0
			AND accounts_cstm.url_c = :seo_url
			LIMIT 1;"
		);
		
		$handle->bindValue(':seo_url', $seo_url);
	}
	else {
		$handle = $suitecrm_link->prepare(
			"SELECT *
			from accounts, accounts_cstm
			WHERE id = id_c
			AND deleted = 0
			AND id = :id
			LIMIT 1;"
		);
		
		$handle->bindValue(':id', $id);
	}
	$handle->execute();
	
	$result = $handle->fetch(PDO::FETCH_ASSOC);
	//print_r($result);
	if(!$result) return false;
	
	$result = format_scrm_account($result);
	
	return $result;
	return false;
}

$suitecrm_language_file = 'suitecrm/custom/include/language/en_us.lang.php';
if(file_exists('suitecrm/custom/include/language/en_us.lang.php')) require_once('suitecrm/custom/include/language/en_us.lang.php');
function format_scrm_account($result){
	global $app_list_strings;
	
	if(!$result) return false;
	
	// Do formatting here
	$result['account_type'] = $app_list_strings['account_type_dom'][str_replace("^","",$result['account_type'])];
	
	$result['category_c'] = explode(",",str_replace("^","",$result['category_c']));
	$return_list = "";
	foreach($result['category_c'] as $c){
		if(strlen($return_list)) $return_list .= ", ";
		$return_list .= $app_list_strings['category_list'][$c];
	}
	$result['category_c'] = $return_list;
	
	$result['regions_c'] =explode(",",str_replace("^","",$result['regions_c']));
	$return_list = "";
	foreach($result['regions_c'] as $c){
		if(strlen($return_list)) $return_list .= ", ";
		$return_list .= $app_list_strings['regions_list'][$c];
	}
	$result['regions_c'] = $return_list;
	
	return $result;
}

function get_accounts($account_type, $subcat, $search, $results_per_page, $page_num){
	global $suitecrm_link;
	
	$handle = $suitecrm_link->prepare(
		"SELECT *
		from accounts, accounts_cstm
		WHERE id = id_c
		AND deleted = 0
		AND accounts.account_type like :account_type
		AND category_c like :subcat
		AND name like :name
		LIMIT :pn, :rpp;"
	);
	
	$handle->bindValue(':account_type', '%' . $account_type . '%');
	$handle->bindValue(':subcat', '%' . $subcat . '%');
	$handle->bindValue(':name', '%' . $search . '%');
	$handle->bindValue(':pn', $results_per_page * ($page_num -1), PDO::PARAM_INT);
	$handle->bindValue(':rpp', $results_per_page, PDO::PARAM_INT);
	$handle->execute();
	
	$accounts = $handle->fetchAll(PDO::FETCH_ASSOC);
	
	for($i=0;$i<count($accounts);$i++){
		$accounts[$i] = format_scrm_account($accounts[$i]);
	}
	
	return $accounts;
}


function get_associations($id){

	
	global $suitecrm_link;
	
	//member of associations	
	$handle = $suitecrm_link->prepare(
		"SELECT name, url_c
		from accounts a, accounts_cstm ac, accounts_accounts_2_c a_to_a
		WHERE a.id = ac.id_c
		AND a.id = a_to_a.accounts_accounts_2accounts_ida
		AND a.deleted = 0
		AND a_to_a.deleted = 0
		AND a_to_a.accounts_accounts_2accounts_idb = :id;"
	);
	
	$handle->bindValue(':id', $id);
	$handle->execute();	
	
	$associations = $handle->fetchAll(PDO::FETCH_ASSOC);
	//print_r($associations);
	/*for($i=0;$i<count($associations);$i++){
		$associations[$i] = format_account($associations[$i]);
	}*/
	
	//association members
	$handle = $suitecrm_link->prepare(
		"SELECT name, url_c
		from accounts a, accounts_cstm ac, accounts_accounts_2_c a_to_a
		WHERE a.id = ac.id_c
		AND a.id = a_to_a.accounts_accounts_2accounts_idb
		AND a.deleted = 0
		AND a_to_a.deleted = 0
		AND a_to_a.accounts_accounts_2accounts_ida = :id;"
	);
	
	$handle->bindValue(':id', $id);
	$handle->execute();	
	
	$members = $handle->fetchAll(PDO::FETCH_ASSOC);

	/*for($i=0;$i<count($members);$i++){
		$members[$i] = format_account($members[$i]);
	}*/
	
	return array(
		'associations' => $associations,
		'members' => $members
	);
}

function get_groups($id){

	
	global $suitecrm_link;
	
	//member of groups	
	$handle = $suitecrm_link->prepare(
		"SELECT name, url_c
		from accounts a, accounts_cstm ac, accounts_accounts_1_c a_to_a
		WHERE a.id = ac.id_c
		AND a.id = a_to_a.accounts_accounts_1accounts_ida
		AND a.deleted = 0
		AND a_to_a.deleted = 0
		AND a_to_a.accounts_accounts_1accounts_idb = :id;"
	);
	
	$handle->bindValue(':id', $id);
	$handle->execute();	
	
	$groups = $handle->fetchAll(PDO::FETCH_ASSOC);
	//print_r($associations);
	/*for($i=0;$i<count($associations);$i++){
		$associations[$i] = format_account($associations[$i]);
	}*/
	
	//group members
	$handle = $suitecrm_link->prepare(
		"SELECT name, url_c
		from accounts a, accounts_cstm ac, accounts_accounts_1_c a_to_a
		WHERE a.id = ac.id_c
		AND a.id = a_to_a.accounts_accounts_1accounts_idb
		AND a.deleted = 0
		AND a_to_a.deleted = 0
		AND a_to_a.accounts_accounts_1accounts_ida = :id;"
	);
	
	$handle->bindValue(':id', $id);
	$handle->execute();	
	
	$members = $handle->fetchAll(PDO::FETCH_ASSOC);

	/*for($i=0;$i<count($members);$i++){
		$members[$i] = format_account($members[$i]);
	}*/
	
	return array(
		'groups' => $groups,
		'members' => $members
	);
}


function my_query_vars( $query_vars ){
    $query_vars[] = 'seovar1';
	$query_vars[] = 'seovar2';
	$query_vars[] = 'seovar3';
	$query_vars[] = 'seovar4';
	$query_vars[] = 'seovar5';
    return $query_vars;
}
add_filter( 'query_vars', 'my_query_vars' );

function check_for_pages(){
	global $wp_query;
	
	if( $wp_query->is_404){
		//print_r($wp_query);
		$check_suitecrm = true;
        /*$currentURI = !empty($_SERVER['REQUEST_URI']) ? trim($_SERVER['REQUEST_URI'], '/') : '';
        if ($currentURI) {
           // $categoryBaseName = trim(get_option('category_base'), '/.'); // Remove / and . from base
		   $categoryBaseName = "category";
            if ($categoryBaseName) {
                // Perform fixes for category_base matching start of permalink custom structure

                if ( $wp_query->query['seovar2'] == $categoryBaseName ) {
                    // Find the proper category
                    $childCategoryObject = get_category_by_slug($wp_query->query['category_name']);

                    // Make sure we have a category
                    if (is_object($childCategoryObject)) {
                        $paged = ($wp_query->query['paged']) ? $wp_query->query['paged']: 1;
                        $wp_query->query(array(
                                              'cat' => $childCategoryObject->term_id,
                                              'paged'=> $paged
                                         )
                        );
                        // Set our accepted header
                        status_header( 200 ); // Prevents 404 status
						$check_suitecrm = false;
                    }
                    unset($childCategoryObject);
                }
            }
            unset($categoryBaseName);
        }
        unset($currentURI);
    */
		//Check for SuiteCRM
		if($check_suitecrm){
			$show_404 = false;
			if(isset($wp_query->query_vars['name'])) {
				//If a business or other page
				$page = get_page_by_title($wp_query->query_vars['name']);
				
				if(!$page || !is_page($page->ID) ) { 
					//print_r($wp_query);
					if(isset($wp_query->query['name'])) {
						$account_seo = urldecode($wp_query->query['name']);
						$account_details = get_account_details($account_seo);
						if($account_details){
							 $wp_query->is_404 = false;
							 status_header( 200 ); // Prevents 404 status
							//require_once('page.php');
						}
					}
				}
			}
		}
    }
	/*
	else if( $wp_query->query['pagename'] == 'blog'){
		print_r($wp_query);
		exit;
	}*/
}
add_action( 'template_redirect', 'check_for_pages' );

/*
add_filter('the_title','check_title');

function check_title($title){
	print_r($title);
	global $account_details;
	if(isset($account_details['name'])) {
		return $title . " | " . $account_details['name'];
	}
 
    return $title;
}*/
if (has_action('wp_head','_wp_render_title_tag') == 1) {
    remove_action('wp_head','_wp_render_title_tag',1);
    add_action('wp_head','custom_wp_render_title_tag_filtered',1);
}

function custom_wp_render_title_tag_filtered() {
    if (function_exists('_wp_render_title_tag')) {
        ob_start(); 
        _wp_render_title_tag(); 
        $titletag = ob_get_contents();
        ob_end_clean();
    } else {$titletag = '';}
    return apply_filters('wp_render_title_tag_filter',$titletag);
}

add_filter('wp_render_title_tag_filter','custom_wp_render_title_tag');

function custom_wp_render_title_tag($titletag) {
	global $account_details;
	
	if(isset($account_details) && isset($account_details['name'])) {
		$titletag = str_replace('</title>',' | ' . $account_details['name'] . '</title>',$titletag);
	}
   echo  $titletag;
   return $titletag;
}


//$theuser = array('wp_info' => false, 'suitecrm_info' => false);
$theuser = array('accounts' => false);
function load_user_details(){
	global $theuser;
    if ( is_user_logged_in() )  {
       // $theuser['wp_info'] = wp_get_current_user();
		global $suitecrm_link;
		$handle = $suitecrm_link->prepare(
			"SELECT * from accounts, accounts_cstm
			WHERE id = id_c
			AND deleted = 0
			AND wordpress_user_id_c = ?;"
		);
			$handle->bindValue(1,get_current_user_id());
	
		$handle->execute();
		$theuser['accounts'] = $handle->fetchAll(PDO::FETCH_ASSOC);
		
		//Get E-Mail Addresses
		for($i=0;$i<count($theuser['accounts']);$i++){
			$handle = $suitecrm_link->prepare(
			"SELECT email_address 
			FROM email_addresses ea, email_addr_bean_rel eabr
			WHERE ea.id = eabr.email_address_id
			AND eabr.bean_id = ?
			AND ea.deleted = 0
			AND eabr.deleted = 0
			ORDER BY primary_address DESC;"
		);
			$handle->bindValue(1,$theuser['accounts'][$i]['id']);
		
			$handle->execute();
			$result = $handle->fetch(PDO::FETCH_ASSOC);
			$theuser['accounts'][$i]['email_address'] = $result['email_address'];
		}
    }
	//print_r($theuser);
}
add_action('init', 'load_user_details');



//print_r($_SERVER);
// If Page is Blog or Archive
function is_blog () {
    return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
}

// JQuery, Swiper, Unveil, Images Loaded, Isotope
$theme_dir = get_stylesheet_directory_uri();

wp_register_script( 'jquery', $theme_dir . '/js/jquery-3.1.0.min.js' );
wp_enqueue_script( 'jquery', $theme_dir . '/js/jquery-3.1.0.min.js' );

wp_register_script( 'swiper', $theme_dir . '/js/swiper.min.js' );
wp_enqueue_script( 'swiper', $theme_dir . '/js/swiper.min.js' );

wp_register_script( 'unveil', $theme_dir . '/js/jquery.unveil.min.js' );
wp_enqueue_script( 'unveil', $theme_dir . '/js/jquery.unveil.min.js' );

wp_register_script( 'imagesloaded', $theme_dir . '/js/imagesloaded.pkgd.min.js' );
wp_enqueue_script( 'imagesloaded', $theme_dir . '/js/imagesloaded.pkgd.min.js' );

wp_register_script( 'isotope', $theme_dir . '/js/isotope.pkgd.min.js' );
wp_enqueue_script( 'isotope', $theme_dir . '/js/isotope.pkgd.min.js' );

// Limit Excerpt Length
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}
 
function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }	
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}

// Limit Post Length
function max_title_length( $title ) {
	$max = 240;
	if( strlen( $title ) > $max ) {
		return substr( $title, 0, $max ). " &hellip;";
	} else {
		return $title;
	}
}

// Replace Parent Theme's metadata function
function child_remove_parent_function() {
    remove_action( 'init', 'wp_bootstrap_starter_posted_on' );
}
add_action( 'wp_loaded', 'child_remove_parent_function' );

function wp_bootstrap_starter_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'wp-bootstrap-starter' ),
		$time_string
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'wp-bootstrap-starter' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="byline">' . $byline . '</span> | <span class="posted-on"> ' . $posted_on . '</span>'; // WPCS: XSS OK.

    if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
        echo ' | <span class="comments-link"><i class="fa fa-comments" aria-hidden="true"></i> ';
        /* translators: %s: post title */
        comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'wp-bootstrap-starter' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
        echo '</span>';
    }
}

// Replace Parent Theme's entry footer function 
function wp_bootstrap_starter_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'wp-bootstrap-starter' ) );
		if ( $categories_list && wp_bootstrap_starter_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in: %1$s', 'wp-bootstrap-starter' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'wp-bootstrap-starter' ) );
		if ( $tags_list ) {
			echo '<div class="tags-links-title">Tags:</div><div class="tag_block">';
			printf( '<span class="tags-links">' . esc_html__( '%1$s', 'wp-bootstrap-starter' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			echo '</div>';
		}
	}
}


function get_images_from_media_library() {
    $args = array(
        'post_type' => 'attachment',
        'post_mime_type' =>'image',
        'post_status' => 'inherit',
        'posts_per_page' => 12,
        'orderby' => 'rand'
    );
    $query_images = new WP_Query( $args );
    $images = array();
    foreach ( $query_images->posts as $image) {
        $images[]= $image->guid;
    }
    return $images;
}

function display_images_from_media_library() {

	$imgs = get_images_from_media_library();
	$html = '<div id="media-gallery">';
	
	foreach($imgs as $img) {
	
		$html .= '<img src="' . $img . '" alt="" />';
	
	}
	
	$html .= '</div>';
	
	return $html;

}

// Edit Profile Form
add_shortcode( 'edit_profile_form', 'edit_profile_form' );
function edit_profile_form( $atts ) {
	ob_start();
	include('edit_profile_form.php');	
	$edit_profile_form = ob_get_contents();
	ob_end_clean();
	return $edit_profile_form;
};

// Edit Slideshow Form
add_shortcode( 'edit_slideshow', 'edit_slideshow' );
function edit_slideshow( $atts ) {
	ob_start();
	include('edit_slideshow.php');	
	$edit_slideshow = ob_get_contents();
	ob_end_clean();
	return $edit_slideshow;
};

// About Page
add_shortcode( 'about', 'about' );
function about( $atts ) {
	ob_start();
	include('about.php');	
	$about = ob_get_contents();
	ob_end_clean();
	return $about;
};

// Privacy Policy Page
add_shortcode( 'privacy_policy', 'privacy_policy' );
function privacy_policy( $atts ) {
	ob_start();
	include('privacy_policy.php');	
	$privacy_policy = ob_get_contents();
	ob_end_clean();
	return $privacy_policy;
};

// Terms of Use Page
add_shortcode( 'terms_of_use', 'terms_of_use' );
function terms_of_use( $atts ) {
	ob_start();
	include('terms_of_use.php');	
	$terms_of_use = ob_get_contents();
	ob_end_clean();
	return $terms_of_use;
};

// Advertising Information Page
add_shortcode( 'advertising_information', 'advertising_information' );
function advertising_information( $atts ) {
	ob_start();
	include('advertising_information.php');	
	$advertising_information = ob_get_contents();
	ob_end_clean();
	return $advertising_information;
};

// Contact Page
add_shortcode( 'contact_us', 'contact_us' );
function contact_us( $atts ) {
	ob_start();
	include('contact_us.php');	
	$contact_us = ob_get_contents();
	ob_end_clean();
	return $contact_us;
};

// Highlight Search Results 
function highlight_results($text){
    if(is_search()){
		$keys = implode('|', explode(' ', get_search_query()));
		$text = preg_replace('/(' . $keys .')/iu', '<span class="search-highlight">\0</span>', $text);
    }
    return $text;
}
add_filter('the_content', 'highlight_results');
add_filter('the_excerpt', 'highlight_results');
add_filter('the_title', 'highlight_results');
 
function highlight_results_css() {}
add_action('wp_head','highlight_results_css');