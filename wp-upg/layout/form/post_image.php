<?php
global $post; 
$options = get_option('upg_settings');


if(isset($options['editor']) && $options['editor']=='1' )
	$editor=true;
else
	$editor=false;	


$title='';

$abc="";
ob_start ();
if (isset($_POST['user-submitted-title'], $_POST['upg-nonce']) && !empty($_POST['user-submitted-title']) && wp_verify_nonce($_POST['upg-nonce'], 'upg-nonce')) 
$title=sanitize_text_field($_POST['user-submitted-title']);

	if($title=='')
{

	//Form not submitted yet.

}
else
{
		$author = ''; $url = ''; $email = ''; $tags = ''; $captcha = ''; $verify = ''; $content = ''; $category = ''; 
	
		
		
		
		
		if (isset($_POST['user-submitted-content']))  $content  = upg_sanitize_content($_POST['user-submitted-content']);
		if (isset($_POST['gallery'])) $gallery = $_POST['gallery'];
		$post_category =  $_POST['cat'];
		//print_r($_POST);
		//check if cat exists
		$cat_exists = term_exists(intval($gallery), 'upg_cate' );	
		global $suitecrm_link;
		global $theuser;
		$business_id = "";
		foreach($theuser['accounts'] as $a){
			$business_id = $a['id'];
		}
		

		if($cat_exists) {
			$term_info = get_term_by('id',intval($gallery) , 'upg_cate'); 
			
			//check if gallery name has been updated
			/*if($term_info->name != $_POST['cat_name']){
				wp_update_term($term_info->term_id, 'upg_cate', array('name'=>$_POST['cat_name']));
			}*/
			$gallery = $term_info->term_id;
		}
		else{
			//print_r($_POST);
		}
			
			
		if(!$cat_exists && $business_id) { 
			$result = wp_insert_term(
			  $_POST['cat_name'], // the term 
			  'upg_cate', // the taxonomy
			  array(
				'description' => 'Gallery',
				'slug' => $gallery ,
			  )
			);
		//	print_r($result);
		//add taxonomy, add to user's business, etc.
			$gallery = $result['term_id'];
			
			$gpos = substr($gallery , -1);
			
			$sql = "UPDATE accounts_cstm 
			SET gallery_" . $gpos . "_shortcode_c = :pos,
			gallery_" . $gpos . "_title_c = :title
			WHERE id_c = :id;";
			
			$handle = $suitecrm_link->prepare($sql);
			$handle->bindValue(":pos", $gallery);
			$handle->bindValue(":title", $_POST['cat_name']);
			$handle->bindValue(":id",$business_id);
			
			$handle->execute();
			
		}
		$content=str_replace("[","[[",$content);
		$content=str_replace("]","]]",$content);
		
		$image_cnt = $_POST['image_count'];
		for($ic = 1; $ic<= $image_cnt;$ic++){
			$files = array();
			if (isset($_FILES['user-submitted-image-' . $ic]))
			{
				$files = $_FILES['user-submitted-image-' . $ic];
			
			}
			$result = upg_submit($title, $files, $content, $gallery, $preview);
			//print_r($result);
			$post_id = false; 
			if (isset($result['id'])) $post_id = $result['id'];
			
			$error = false;
			if (isset($result['error'])) $error = array_filter(array_unique($result['error']));
			
			 if ($post_id) 
			{
				//Submit extra fields data
				for ($x = 1; $x <= 10; $x++) 
				{
					if (isset($_POST['upg_custom_field_'.$x]))
					add_post_meta($post_id, 'upg_custom_field_'.$x, $_POST['upg_custom_field_'.$x]);
					
				}
				
				//Ended to submit extra fields
				if($_POST['tags']){
						wp_set_post_tags($post_id, $_POST['tags']);
						wp_set_post_tags($post_id+1, $_POST['tags']);
					}
				foreach($post_category as $p){
					wp_set_post_categories( $post_id, $p,true );
					wp_set_post_categories( $post_id+1, $p,true );
				}
				
				$post   = get_post( $post_id );
				
				$image=upg_image_src('large',$post);
				
				do_action( "upg_submit_complete");
				
				if(isset($options['publish']) && $options['publish']=='1' )
				{

				echo "<h2>".__('Your Photo Has Been Added.','wp-upg')."</h2>";
				echo "<a href='".esc_url( get_permalink($post_id) )."' class=\"pure-button\">".__('View Photo Here','wp-upg')."</a><br><br><hr>";
				//echo "<h2>".__('Add Another Photo:')."</h2>";
				
				}
			else
			{
				echo "<h2>".__('Your submission is under review.','wp-upg')."</h2>";
				
			}
				
				//echo "<h1 class=\"archive-title\">".$post->post_title."</h1>";
				//echo "<img src='$image'>";
			}
			else
			{
				if ($error) 
				{
					$e = implode(',', $error);
					$e = trim($e, ',');
				} 
				else 
				{
					$e = 'error';
				}
				
				echo "<h1>".__($e.' error','wp-upg')."</h1>";
			}
		}		
		
	?>

	<?php
}

if(isset($params['layout']))
	$layout=trim($params['layout']);
else
	$layout="basic";


if($layout=="personal")
{
	if(file_exists(upg_BASE_DIR."/layout/form/".$layout."/".get_current_blog_id()."_".$layout."_post_form.php"))
		include(upg_BASE_DIR."/layout/form/".$layout."/".get_current_blog_id()."_".$layout."_post_form.php");
	else
		echo __('Layout Not Found. Check Settings and save update again.','wp-upg').": ".$layout;

}
else
{
	if(file_exists(upg_BASE_DIR."/layout/form/".$layout."/".$layout."_post_form.php"))
		include(upg_BASE_DIR."/layout/form/".$layout."/".$layout."_post_form.php");
	else
		echo __('Layout Not Found. Check Settings and save update again.','wp-upg').": ".$layout;
}
	
	
$abc=ob_get_clean (); 
return $abc;
?>