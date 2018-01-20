<?php

// Pulled because it might confuse people 
	
// Return Categories
global $app_list_strings;

$subcats = array();
foreach($app_list_strings['category_list'] as $cat_name => $category) {
	if(stripos($cat_name,$_GET['s']) !== false || stripos($category,$_GET['s']) !== false) {
		$category = explode(":",$category);
		
		if(!isset($subcats[$category[0]])) $subcats[$category[0]] = array();
		if(!isset($category[1])) $category[1] = $category[0];
		$subcats[$category[0]][] = array(
			'id' => $cat_name,
			'name' => $category[1],
		);
	}
}
if($subcats){
	if(isset($subcats['Local Professionals'])){
		foreach($subcats['Local Professionals'] as $s){
			echo "
				<div class='browse_search_result'>
				<header class='entry-header'>
					<h2><a href='" . esc_url( home_url( '/' ) ) ."find-local-professionals/?subcat=". $s['id'] . "'>Browse " . $s['name'] ." »</a></h2>
				</header>
				</div>";
		}
	}
	if(isset($subcats['Stores'])){
		foreach($subcats['Stores'] as $s){
			echo "
				<div class='browse_search_result'>
				<header class='entry-header'>
					<h2><a href='" . esc_url( home_url( '/' ) ) ."find-local-store/?subcat=". $s['id'] . "'>Browse " . $s['name'] ." »</a></h2>
				</header>
				</div>";
		}
	}
	if(isset($subcats['Manufacturers'])){
		foreach($subcats['Manufacturers'] as $s){
			echo "
				<div class='browse_search_result'>
				<header class='entry-header'>
					<h2><a href='" . esc_url( home_url( '/' ) ) ."find-manufacturers/?subcat=". $s['id'] . "'>Browse " . $s['name'] ." »</a></h2>
				</header>
				</div>";
		}
	}
}
	
?>