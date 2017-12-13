<?php 



// Social Icons
add_shortcode( 'social_icons', 'social_icons' );
function social_icons( $atts ) {

	/* Turn on buffering */
	ob_start();
	
	include('includes/social_icons.php');	

	/* Get the buffered content into a var */
	$social_icons = ob_get_contents();

	/* Clean buffer */
	ob_end_clean();

	/* Return the content as usual */
	return $social_icons;

};

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

function get_account_details($link = false, $seo_url){
	echo getcwd();
	global $app_list_strings;
	
	require_once('suitecrm/custom/include/language/en_us.lang.php');
	//print_r($app_list_strings);
	if(!$link) pdo_db_connect();
	
	$handle = $link->prepare(
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


add_filter( 'query_vars', 'my_query_vars' );
function my_query_vars( $query_vars ){
    $query_vars[] = 'seovar1';
	$query_vars[] = 'seovar2';
	$query_vars[] = 'seovar3';
	$query_vars[] = 'seovar4';
	$query_vars[] = 'seovar5';
    return $query_vars;
}

// JQuery, Swiper, Unveil
$theme_dir = get_stylesheet_directory_uri();

wp_register_script( 'jquery', $theme_dir . '/js/jquery-3.1.0.min.js' );
wp_enqueue_script( 'jquery', $theme_dir . '/js/jquery-3.1.0.min.js' );

wp_register_script( 'swiper', $theme_dir . '/js/swiper.min.js' );
wp_enqueue_script( 'swiper', $theme_dir . '/js/swiper.min.js' );

wp_register_script( 'unveil', $theme_dir . '/js/jquery.unveil.min.js' );
wp_enqueue_script( 'unveil', $theme_dir . '/js/jquery.unveil.min.js' );