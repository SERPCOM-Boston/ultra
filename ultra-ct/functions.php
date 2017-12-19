<?php 

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
require_once('suitecrm/custom/include/language/en_us.lang.php');

function get_account_details($seo_url){
	//echo getcwd();
	
	global $suitecrm_link;
	//print_r($app_list_strings);
	//echo "SEO: " . $seo_url;
	$handle = $suitecrm_link->prepare(
		"SELECT *
		from accounts, accounts_cstm
		WHERE id = id_c
		AND deleted = 0
		AND accounts_cstm.url_c = :seo_url
		LIMIT 1;"
	);
	
	$handle->bindValue(':seo_url', $seo_url);
	$handle->execute();
	
		
	$result = $handle->fetch(PDO::FETCH_ASSOC);
	//print_r($result);
	if(!$result) return false;
	
	$result = format_scrm_account($result);
	
	return $result;
	return false;
}

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
	
	$return_list = "";
	foreach($result['regions_c'] as $c){
		if(strlen($return_list)) $return_list .= ", ";
		$return_list .= $app_list_strings['regions_list'][$c];
	}
	$result['regions_c'] = $return_list;
	
	return $result;
}

function get_accounts($account_type){
	global $suitecrm_link;
	
	$handle = $suitecrm_link->prepare(
		"SELECT *
		from accounts, accounts_cstm
		WHERE id = id_c
		AND deleted = 0
		AND accounts_cstm.category_c like :search_val
		LIMIT 1;"
	);
	
	$handle->bindValue(':search_val', '%' . $accounty_type . '%');
	$handle->execute();
	
	$accounts = $handle->fetchAll(PDO::FETCH_ASSOC);
	
	for($i=0;$i<count($accounts);$i++){
		$accounts[$i] = format_account($accounts[$i]);
	}
	
	return $accounts();
}


function get_associations($id){
	global $suitecrm_link;
	
	//member of associations	
	$handle = $suitecrm_link->prepare(
		"SELECT *
		from accounts a, accounts_cstm ac, accounts_accounts_1_c a_to_a
		WHERE a.id = ac.id_c
		AND a.id = a_to_c.accounts_accounts_1accountsida
		AND a.deleted = 0
		AND a_to_c.deleted = 0
		AND a_to_c.accounts_accounts_1accountsidb = :id;"
	);
	
	$handle->bindValue(':id', $id);
	$handle->execute();	
	
	$associations = $handle->fetchAll(PDO::FETCH_ASSOC);
	for($i=0;$i<count($associations);$i++){
		$associations[$i] = format_account($associations[$i]);
	}
	
	//association members
	$handle = $suitecrm_link->prepare(
		"SELECT *
		from accounts a, accounts_cstm ac, accounts_accounts_1_c a_to_a
		WHERE a.id = ac.id_c
		AND a.id = a_to_c.accounts_accounts_1accountsidb
		AND a.deleted = 0
		AND a_to_c.deleted = 0
		AND a.accounts_accounts_1accountsida = :id;"
	);
	
	$handle->bindValue(':id', $id);
	$handle->execute();	
	
	$members = $handle->fetchAll(PDO::FETCH_ASSOC);

	for($i=0;$i<count($members);$i++){
		$members[$i] = format_account($members[$i]);
	}
	
	return array(
		'associations' => $associations,
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

function check_for_suitecrm_page(){
	
    if( is_404() ){
		global $wp_query;
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
						//require_once('page.php');
					}
				}
			}
		}
    }
}
add_action( 'template_redirect', 'check_for_suitecrm_page' );




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