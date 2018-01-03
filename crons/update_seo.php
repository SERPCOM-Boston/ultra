<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once("../wp-config.php");

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


function check_seo($original_url, $extra_mod = ""){
	global $suitecrm_link;
	
	$handle = $suitecrm_link->prepare("SELECT count(*) as url_cnt FROM accounts_cstm WHERE url_c = :test_url;");
	$handle->bindValue(':test_url', $original_url . "-" . $extra_mod);
	$handle->execute();
	
	$result = $handle->fetch(PDO::FETCH_ASSOC);
	
	if($result['url_cnt'] > 0) {
		if($extra_mod == '') $extra_mod = 0;
		$original_url = check_seo($original_url, $extra_mod+1);
	}	
	
	if($extra_mod != "") $extra_mod = "-" . $extra_mod;
	return $original_url . $extra_mod;
}

function seo_friend($text) {
	return preg_replace("![^a-z0-9]+!i", "-",strtolower($text));
}


if(!isset($suitecrm_link)) $suitecrm_link = pdo_db_connect();

$handle = $suitecrm_link->prepare(
	"SELECT name, id
	FROM accounts, accounts_cstm
	WHERE id=id_c
	AND (url_c is null
	OR url_c = ''
	or url_c = 'http://');
	"
);

$handle->execute();

$accounts = $handle->fetchAll(PDO::FETCH_ASSOC);

foreach($accounts as $a){
	global $suitecrm_link;
	$account_seo = check_seo(seo_friend($a['name']));
	
	$handle = $suitecrm_link->prepare(
		"UPDATE accounts_cstm
		SET url_c = :url
		WHERE id_c = :id;"
	);
	
	$handle->bindValue(':url', $account_seo);
	$handle->bindValue(':id', $a['id']);
	$handle->execute();
	
}
?>
Complete.


