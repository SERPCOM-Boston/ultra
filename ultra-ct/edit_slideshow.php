<?php
global $app_list_strings;
global $theuser;

if(isset($_POST['business_id'])){
	$proceed = false;
	extract($_POST);
	foreach($theuser['accounts'] as $a){
		if($a['id'] == $business_id || !$business_id) {
			//This is one of the users account and we can edit it.
			$proceed = true;
		}
		if($proceed) {
			
			global $suitecrm_link;
			
			$handle = $suitecrm_link->prepare(
				"			
				UPDATE accounts
				SET name = :name,
				account_type = :account_type,
				description = :description,
				billing_address_city = :billing_address_city,
				billing_address_country = :billing_address_country,
				billing_address_postalcode = :billing_address_postalcode,
				phone_office = :phone_office,
				website = :website
				WHERE id = :id;
				
				UPDATE accounts_cstm
				SET short_name_c = :short_name_c,
				regions_c = :regions_c,
				category_c = :category_c,
				award_textarea_c = :award_textarea_c,
				facebook_url_c = :facebook_url_c,
				instagram_url_c = :instagram_url_c,
				twitter_url_c = :twitter_url_c,
				pinterest_url_c = :pinterest_url_c,
				tumblr_url_c = :tumblr_url_c,
				youtube_url_c = :youtube_url_c,
				google_plus_url_c = :google_plus_url_c,
				linkedin_url_c = :linkedin_url_c,
				billing_address_street_1_c = :billing_address_street_1_c,
				billing_address_street_2_c = :billing_address_street_2_c,
				billing_address_state_abbrev_c = :billing_address_state,
				billing_contact_c = :billing_contact_c,
				billing_phone_c = :billing_phone_c,
				billing_contact_email_c = :billing_contact_email_c
				WHERE id_c = :id;
				
				UPDATE email_addresses ea, email_addr_bean_rel eabr
				SET ea.email_address = :email_address
				WHERE  ea.id = eabr.email_address_id
				AND eabr.bean_id = :id
				AND ea.deleted = 0
				AND eabr.deleted = 0
				ORDER BY primary_address DESC
				LIMIT 1;"
			);
			
			$handle->bindValue(':id', $business_id);
			$handle->bindValue(':name', $business_name);
			$handle->bindValue(':account_type', $account_type);
			$handle->bindValue(':description', $description);
			$handle->bindValue(':billing_address_city', $billing_address_city);
			$handle->bindValue(':billing_address_country', $billing_address_country);
			$handle->bindValue(':billing_address_postalcode', $billing_address_postalcode);
			$handle->bindValue(':phone_office', $phone_office);
			$handle->bindValue(':website', $website);
			
			$handle->bindValue(':short_name_c', $short_name_c);
			$handle->bindValue(':regions_c', $regions_c);
			$handle->bindValue(':category_c', $category_c);
			$handle->bindValue(':award_textarea_c', $award_textarea_c);
			$handle->bindValue(':facebook_url_c', $facebook_url_c);
			$handle->bindValue(':instagram_url_c', $instagram_url_c);
			$handle->bindValue(':twitter_url_c', $twitter_url_c);
			$handle->bindValue(':pinterest_url_c', $pinterest_url_c);
			$handle->bindValue(':tumblr_url_c', $tumblr_url_c);
			$handle->bindValue(':youtube_url_c', $youtube_url_c);
			$handle->bindValue(':google_plus_url_c', $google_plus_url_c);
			$handle->bindValue(':linkedin_url_c', $linkedin_url_c);
			$handle->bindValue(':billing_address_street_1_c', $billing_address_street_1_c);
			$handle->bindValue(':billing_address_street_2_c', $billing_address_street_2_c);
			$handle->bindValue(':billing_address_state', $billing_address_state_abbrev_c);
			$handle->bindValue(':billing_contact_c', $billing_contact_c);
			$handle->bindValue(':billing_phone_c', $billing_phone_c);
			$handle->bindValue(':billing_contact_email_c', $billing_contact_email_c);
			$handle->bindValue(':email_address', $email_address);
			
			
			$handle->execute();
			
			?>
			<script>
			window.location.href="<?php echo esc_url( home_url( '/' ) ) . $url; ?>";
			</script>
			<?php
			exit();
		}
	}
}
else {
$business_id = false;
if(isset($_GET['id'])) $business_id = $_GET['id'];
//print_r($theuser);

$theaccount = false;
foreach($theuser['accounts'] as $a){
	if($a['id'] == $business_id || !$business_id) {
		//This is one of the users account and we can edit it.
		$theaccount = $a;
	}
}

?>
<div class="container edit_profile_form_container">
	<div class="row">
		<div class="col-xs-12 col-lg-8 offset-lg-2">

<p><a href="https://ultraoutdoors.net/ultra/edit-profile/">Edit Profile »</a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="https://ultraoutdoors.net/ultra/post-image/">Manage Galleries »</a></p>

<form class="edit_profile_form" action="<?php echo esc_url( home_url( '/' ) ); ?>edit-profile/" method="post">

<!-- Basic Info -->
<div class="form-row">

	<input type="hidden" name="business_id" id="business_id" value="<?php echo $theaccount['id']; ?>" />
	

	<div class="form-group col-12">
		<label for="file_logo">Slideshow Image 1 </label>
		<div id="" style="padding: 8px;border: 1px solid #ddd;">
			<label for="file_logo"><?php _e('Select Image', 'wp-upg'); ?></label>
		  	<input class="pure-input-1-2" id="file_logo" name="user-submitted-image-1[]" style="margin-bottom: 10px;" type="file" size="25">
			<button type="submit" name="SN" class="pure-button pure-button-primary"><i class="fa fa-upload fa-lg"></i> <?php esc_html_e( 'Upload Logo', 'wp-upg' ); ?></button>
		</div>
	</div>

	<div class="form-group col-12">
		<label for="file_logo">Slideshow Image 2 </label>
		<div id="" style="padding: 8px;border: 1px solid #ddd;">
			<label for="file_logo"><?php _e('Select Image', 'wp-upg'); ?></label>
		  	<input class="pure-input-1-2" id="file_logo" name="user-submitted-image-1[]" style="margin-bottom: 10px;" type="file" size="25">
			<button type="submit" name="SN" class="pure-button pure-button-primary"><i class="fa fa-upload fa-lg"></i> <?php esc_html_e( 'Upload Logo', 'wp-upg' ); ?></button>
		</div>
	</div>

	<div class="form-group col-12">
		<label for="file_logo">Slideshow Image 3 </label>
		<div id="" style="padding: 8px;border: 1px solid #ddd;">
			<label for="file_logo"><?php _e('Select Image', 'wp-upg'); ?></label>
		  	<input class="pure-input-1-2" id="file_logo" name="user-submitted-image-1[]" style="margin-bottom: 10px;" type="file" size="25">
			<button type="submit" name="SN" class="pure-button pure-button-primary"><i class="fa fa-upload fa-lg"></i> <?php esc_html_e( 'Upload Logo', 'wp-upg' ); ?></button>
		</div>
	</div>

	<div class="form-group col-12">
		<label for="file_logo">Slideshow Image 4 </label>
		<div id="" style="padding: 8px;border: 1px solid #ddd;">
			<label for="file_logo"><?php _e('Select Image', 'wp-upg'); ?></label>
		  	<input class="pure-input-1-2" id="file_logo" name="user-submitted-image-1[]" style="margin-bottom: 10px;" type="file" size="25">
			<button type="submit" name="SN" class="pure-button pure-button-primary"><i class="fa fa-upload fa-lg"></i> <?php esc_html_e( 'Upload Logo', 'wp-upg' ); ?></button>
		</div>
	</div>

	<div class="form-group col-12">
		<label for="file_logo">Slideshow Image 5 </label>
		<div id="" style="padding: 8px;border: 1px solid #ddd;">
			<label for="file_logo"><?php _e('Select Image', 'wp-upg'); ?></label>
		  	<input class="pure-input-1-2" id="file_logo" name="user-submitted-image-1[]" style="margin-bottom: 10px;" type="file" size="25">
			<button type="submit" name="SN" class="pure-button pure-button-primary"><i class="fa fa-upload fa-lg"></i> <?php esc_html_e( 'Upload Logo', 'wp-upg' ); ?></button>
		</div>
	</div>

</div>
<!-- End Basic Info -->


	<div class="text-center">
		<button type="submit" class="btn btn-dark btn-lg">Save</button>
	</div>

</form>


</div>
</div>
</div>

<?php
}
?>