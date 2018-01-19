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
			Updated! Now forwarding you to your profile.
			<script>
			window.location.href="<?php echo esc_url( home_url( '/' ) ) . $url; ?>";
			</script>
			<?php
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

<form class="edit_profile_form" action="<?php echo esc_url( home_url( '/' ) ); ?>edit-profile/" method="post">

<!-- Basic Info -->
<div class="form-row">

	<input type="hidden" name="business_id" id="business_id" value="<?php echo $theaccount['id']; ?>" />
	
	<div class="form-group col-12">
		<label for="name">Business Name*</label>
		<input class="form-control" type="text" name="business_name" id="business_name" value="<?php echo $theaccount['name']; ?>" required>
	</div>


	<div class="form-group col-12">
		<label for="short_name_c">Short Name</label>
		<input class="form-control" type="text"  name="short_name_c" id="short_name_c" value="<?php echo $theaccount['short_name_c']; ?>" aria-describedby="short_name_c_help">
		<small class="form-text text-muted" id="short_name_c_help">Optional abbreviation or short version of your business name. </small>
	</div>


	<div class="form-group col-12">
		<label for="url">Your Ultra Outdoors Page URL (assigned automatically)</label>
		<input class="form-control-plaintext"  name="url" type="text" id="url"  value="<?php echo $theaccount['url_c']; ?>" readonly>
	</div>


	<div class="form-group col-md-6">
		<label for="account_type">Account Type*</label>
		<select class="form-control" name="account_type" id="account_type" aria-describedby="account_type_help" required>
			<option label="" value=""> </option>
			<?php
			foreach($GLOBALS['app_list_strings']['account_type_dom'] as $key=>$opt){
				$selected = "";
				if($key == $theaccount['account_type']) $selected = " SELECTED ";
				echo "<option label='$opt' value='$key' $selected >$opt</option>";
				
			}
			?>
		</select>
		<small class="form-text text-muted" id="account_type_help">Are you a Local Professional, a Store, a Manufacturer, or an Association? </small>
	</div>


	<div class="form-group col-md-6">
		<label for="regions_c">Business Regions</label>
		<select multiple class="form-control"  name="regions_c" id="regions_c" aria-describedby="regions_c_help">
		<?php
		echo $theaccount['regions_c'];
			foreach($GLOBALS['app_list_strings']['regions_list'] as $key=>$opt){
				$selected = "";
				if(strpos($theaccount['regions_c'], "^".$key."^")!== false) $selected = " SELECTED ";
				echo "<option label='$opt' value='$key' $selected >$opt</option>";
				
			}
			?>
		</select>
		<small class="form-text text-muted" id="regions_c_help">If your business is only active in certain states, you can command-click (Mac) or control-click (PC) to select more than one. </small>
	</div>


	<div class="form-group col-12">
		<label for="category_c">Category*</label>
		<select multiple class="form-control"  name="category_c" id="category_c" aria-describedby="category_c_help" required>
		<?php
		echo $theaccount['category_c'];
			foreach($GLOBALS['app_list_strings']['category_list'] as $key=>$opt){
				$selected = "";
				if(strpos($theaccount['category_c'], "^".$key."^")!== false) $selected = " SELECTED ";
				echo "<option label='$opt' value='$key' $selected >$opt</option>";
				
			}
			?>
		</select>
		<small class="form-text text-muted" id="category_c_help">If your business fits more than one category, you can command-click (Mac) or control-click (PC) to select more than one. </small>
	</div>


	<div class="form-group col-12">
		<label for="description">Description</label>
		<textarea class="form-control" id="description"  name="description" rows="12" aria-describedby="description_help"><?php echo $theaccount['description']; ?></textarea>
		<small class="form-text text-muted" id="description_help">Describe your business here.. </small>
	</div>


	<div class="form-group col-12">
		<label for="award_textarea_c">Awards </label>
		<textarea class="form-control" id="award_textarea_c" name="award_textarea_c"  rows="10" aria-describedby="award_textarea_c_help"><?php echo $theaccount['award_textarea_c']; ?></textarea>
		<small class="form-text text-muted" id="award_textarea_c_help">List any industry-related awards or special recognition you have received.</small>
	</div>

</div>
<!-- End Basic Info -->

<hr>

<!-- Social Media -->
<div class="form-row">

	<h4 class="col-12">Social Media</h4>

	<div class="form-group col-md-6">
		<label for="facebook_url_c">Facebook URL</label>
		<input class="form-control" type="url"  name="facebook_url_c" id="facebook_url_c" value="<?php echo $theaccount['facebook_url_c']; ?>" >
	</div>


	<div class="form-group col-md-6">
		<label for="instagram_url_c">Instagram URL</label>
		<input class="form-control" type="url"   name="instagram_url_c" id="instagram_url_c" value="<?php echo $theaccount['instagram_url_c']; ?>">
	</div>


	<div class="form-group col-md-6">
		<label for="twitter_url_c">Twitter URL</label>
		<input class="form-control" type="url"   name="twitter_url_c" id="twitter_url_c" value="<?php echo $theaccount['twitter_url_c']; ?>">
	</div>


	<div class="form-group col-md-6">
		<label for="pinterest_url_c">Pinterest URL</label>
		<input class="form-control" type="url"  name="pinterest_url_c" id="pinterest_url_c" value="<?php echo $theaccount['pinterest_url_c']; ?>">
	</div>


	<div class="form-group col-md-6">
		<label for="tumblr_url_c">Tumblr URL</label>
		<input class="form-control" type="url"  name="tumblr_url_c" id="tumblr_url_c" value="<?php echo $theaccount['tumblr_url_c']; ?>">
	</div>


	<div class="form-group col-md-6">
		<label for="youtube_url_c">YouTube URL</label>
		<input class="form-control" type="url"  name="youtube_url_c" id="youtube_url_c" value="<?php echo $theaccount['youtube_url_c']; ?>">
	</div>


	<div class="form-group col-md-6">
		<label for="google_plus_url_c">Google Plus URL</label>
		<input class="form-control" type="url"  name="google_plus_url_c" id="google_plus_url_c" value="<?php echo $theaccount['google_plus_url_c']; ?>">
	</div>


	<div class="form-group col-md-6">
		<label for="linkedin_url_c">LinkedIn URL</label>
		<input class="form-control" type="url"  name="linkedin_url_c" id="linkedin_url_c" value="<?php echo $theaccount['linkedin_url_c']; ?>">
	</div>

</div>
<!-- End Social Media -->

<hr>

<!-- Address -->
<div class="form-row">

	<h4 class="col-12">Main Location or Corporate Headquarters Address & Information</h4>

	<div class="form-group col-12">
		<label for="billing_address_street_1_c">Street Address* </label>
		<input class="form-control" type="text"  name="billing_address_street_1_c" id="billing_address_street_1_c" value="<?php echo $theaccount['billing_address_street_1_c']; ?>">
	</div>


	<div class="form-group col-12">
		<label for="billing_address_street_2_c">Street Address 2 </label>
		<input class="form-control" type="text"  name="billing_address_street_2_c" id="billing_address_street_2_c" value="<?php echo $theaccount['billing_address_street_2_c']; ?>">
	</div>


	<div class="form-group col-md-8">
		<label for="billing_address_city">City* </label>
		<input class="form-control" type="text"   name="billing_address_city" id="billing_address_city" required value="<?php echo $theaccount['billing_address_city']; ?>">
	</div>


	<div class="form-group col-md-4">
		<label for="billing_address_state_abbrev_c">State* </label>
		<select class="form-control" name="billing_address_state_abbrev_c" id="billing_address_state_abbrev_c" required>
			<?php
			foreach($GLOBALS['app_list_strings']['billing_address_state_abbrev_list'] as $key=>$opt){
				$selected = "";
				if($key == $theaccount['billing_address_state_abbrev_c']) $selected = " SELECTED ";
				echo "<option label='$opt' value='$key' $selected >$opt</option>";
				
			}
			?>
		</select>
	</div>


	<div class="form-group col-md-8">
		<label for="billing_address_country">Country* </label>
		<input class="form-control" type="text"  name="billing_address_country" id="billing_address_country" required value="<?php echo $theaccount['billing_address_country']; ?>">
	</div>


	<div class="form-group col-md-4">
		<label for="billing_address_postalcode">Postal Code* </label>
		<input class="form-control" type="text"  name="billing_address_postalcode" id="billing_address_postalcode" value="<?php echo $theaccount['billing_address_postalcode']; ?>">
	</div>


	<div class="form-group col-md-4">
		<label for="phone_office">Phone </label>
		<input class="form-control" type="text"  name="phone_office" id="phone_office" value="<?php echo $theaccount['phone_office']; ?>">
	</div>


	<div class="form-group col-md-4">
		<label for="website">Website</label>
		<input class="form-control" type="url"  name="website" id="website" value="<?php echo $theaccount['website']; ?>">
	</div>


	<div class="form-group col-md-4">
		<label for="Accounts0emailAddress0">Email Address*</label>
		<input type="email" class="form-control"  name="email_address" id="email_address" aria-describedby="Accounts0emailAddress0_help" value="<?php echo $theaccount['email_address']; ?>">
		<small class="form-text text-muted" id="Accounts0emailAddress0_help">Emails sent from contact form on site send to this address. </small>
	</div>

</div>
<!-- End Address -->

<hr>

<!-- Billing Contact Info -->
<div class="form-row">

	<h4 class="col-12">Billing Contact Info</h4>

	<div class="form-group col-md-4">
		<label for="billing_contact_c">Billing Contact*</label>
		<input class="form-control" type="text"  name="billing_contact_c" id="billing_contact_c" value="<?php echo $theaccount['billing_contact_c']; ?>">
	</div>


	<div class="form-group col-md-4">
		<label for="billing_phone_c">Billing Contact Phone* </label>
		<input class="form-control" type="text"  name="billing_phone_c" id="billing_phone_c" value="<?php echo $theaccount['billing_phone_c']; ?>">
	</div>
	
	
	<div class="form-group col-md-4">
		<label for="billing_contact_email_c">Billing Contact Email* </label>
		<input type="email" class="form-control"  name="billing_contact_email_c" id="billing_contact_email_c" value="<?php echo $theaccount['billing_contact_email_c']; ?>">
	</div> 

</div>
<!-- End Billing Contact Info -->



	<div class="text-center">
		<button type="submit" class="btn btn-dark btn-lg">Submit</button>
	</div>

</form>


</div>
</div>
</div>

<?php
}
?>