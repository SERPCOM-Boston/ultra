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

function get_account_details($link = false, $seo_url){
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
	
	//load in from file and switch out
	switch($result['account_type']){
		case 'a': $result['account_type'] = 'a';break;
		
		default: $result['account_type'] = str_replace("_", " ", $result['account_type']);break;
		
	}
	return $result;
}

add_filter( 'rewrite_rules_array','my_insert_rewrite_rules' );
add_filter( 'query_vars','my_insert_query_vars' );
add_action( 'wp_loaded','my_flush_rules' );

// flush_rules() if our rules are not yet included
function my_flush_rules(){
	
	$rules = get_option( 'rewrite_rules' );
	echo "Flushing";
	print_r($rules);
	if ( ! isset( $rules['(b)/(\w*)$'] ) ) {
		global $wp_rewrite;
	   	$wp_rewrite->flush_rules();
	}
}

// Adding a new rule
function my_insert_rewrite_rules( $rules )
{
	$newrules = array();
	$newrules['(b)/(\w*)$'] = 'index.php?pagename=home&business_id=$matches[2]';
	return $newrules + $rules;
	echo "Rules";
	print_r($rules);
}

// Adding the id var so that WP recognizes it
function my_insert_query_vars( $vars )
{
    array_push($vars, 'business_id');
    return $vars;
	echo "Vars";
	print_r($vars);
}	
/*
function add_query_vars($aVars) {
	$aVars[] = "b"; // represents the business seo as shown in the URL
	return $aVars;
}
 
// hook add_query_vars function into query_vars
add_filter('query_vars', 'add_query_vars');

add_filter('rewrite_rules_array', 'kill_feed_rewrites');
function kill_feed_rewrites($rules){

    foreach ($rules as $rule => $rewrite) {

        if ( preg_match('/^foo.*(feed)/',$rule) ) {
            unset($rules[$rule]);
        }

    }

    return $rules;
}

function add_rewrite_rules($aRules) {
	$aNewRules = array('b/([^/]+)/?$' => 'index.php?pagename=home&b=$matches[1]');
	$aRules = $aNewRules + $aRules;
	return $aRules;
}
 
// hook add_rewrite_rules function into rewrite_rules_array
add_filter('rewrite_rules_array', 'add_rewrite_rules');

/*
function feed_dir_rewrite( $wp_rewrite ) {
    $feed_rules = array( 'b/(.+)' => 'index.php?b=' . $wp_rewrite->preg_index(1));
    $wp_rewrite->rules = $feed_rules + $wp_rewrite->rules;
}
add_filter( 'generate_rewrite_rules', 'feed_dir_rewrite' );
*/
/*
// Register the variables that will be used as parameters on the url
function add_my_var($public_query_vars) {
    $public_query_vars[] = 'bid';
    return $public_query_vars;
}
add_filter('query_vars', 'add_my_var');

// Build the rewrite rules, for the extra parameter
function do_rewrite() {
    add_rewrite_rule('(b)/[/]?([^/]*)$', 'index.php?pagename=home&bid=$matches[1]','top');
}
add_action('init', 'do_rewrite');*/
/*
function custom_rewrite_basic() {
  add_rewrite_rule('^leaf/([0-9]+)/?', 'index.php?page_id=$matches[1]', 'top');
}
add_action('init', 'custom_rewrite_basic');
*/
// JQuery, Swiper, Unveil
$theme_dir = get_stylesheet_directory_uri();

wp_register_script( 'jquery', $theme_dir . '/js/jquery-3.1.0.min.js' );
wp_enqueue_script( 'jquery', $theme_dir . '/js/jquery-3.1.0.min.js' );

wp_register_script( 'swiper', $theme_dir . '/js/swiper.min.js' );
wp_enqueue_script( 'swiper', $theme_dir . '/js/swiper.min.js' );

wp_register_script( 'unveil', $theme_dir . '/js/jquery.unveil.min.js' );
wp_enqueue_script( 'unveil', $theme_dir . '/js/jquery.unveil.min.js' );