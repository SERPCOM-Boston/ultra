<div class="container edit_profile_form_container">
	<div class="row">
		<div class="col-xs-12 col-lg-8 offset-lg-2">

<form class="edit_profile_form">

<!-- Basic Info -->
<div class="form-row">

	<div class="form-group col-12">
		<label for="name">Business Name*</label>
		<input class="form-control" type="text" id="name" required>
	</div>


	<div class="form-group col-12">
		<label for="short_name_c">Short Name</label>
		<input class="form-control" type="text" id="short_name_c" aria-describedby="short_name_c_help">
		<small class="form-text text-muted" id="short_name_c_help">Optional abbreviation or short version of your business name. </small>
	</div>


	<div class="form-group col-12">
		<label for="url">Your Ultra Outdoors Page URL</label>
		<input class="form-control-plaintext" type="text" id="url" value="ultraoutdoors.com/ECHO-URL-STRING here" readonly>
	</div>


	<div class="form-group col-md-6">
		<label for="account_type">Account Type*</label>
		<select class="form-control" name="account_type" id="account_type" aria-describedby="account_type_help" required>
			<option label="" value=""> </option>
			<option label="Association" value="association">Association</option>
			<option label="Local Professionals" value="local_professionals">Local Professionals</option>
			<option label="Store" value="store">Store</option>
			<option label="Manufacturer" value="manufacturer">Manufacturer</option>
		</select>
		<small class="form-text text-muted" id="account_type_help">Are you a Local Professional, a Store, a Manufacturer, or an Association? </small>
	</div>


	<div class="form-group col-md-6">
		<label for="regions_c">Business Regions</label>
		<select multiple class="form-control" id="regions_c" aria-describedby="regions_c_help">
			<option label="United States" value="UnitedStates">United States</option>
			<option label="Continental U.S." value="ContinentalUS">Continental U.S.</option>
			<option label="Global" value="Global">Global</option>
			<option label="Alabama" value="Alabama">Alabama</option>
			<option label="Alaska" value="Alaska">Alaska</option>
			<option label="Arizona" value="Arizona">Arizona</option>
			<option label="Arkansas" value="Arkansas">Arkansas</option>
			<option label="California" value="California">California</option>
			<option label="Colorado" value="Colorado">Colorado</option>
			<option label="Connecticut" value="Connecticut">Connecticut</option>
			<option label="Delaware" value="Delaware">Delaware</option>
			<option label="Florida" value="Florida">Florida</option>
			<option label="Georgia" value="Georgia">Georgia</option>
			<option label="Hawaii" value="Hawaii">Hawaii</option>
			<option label="Idaho" value="Idaho">Idaho</option>
			<option label="Illinois" value="Illinois">Illinois</option>
			<option label="Indiana" value="Indiana">Indiana</option>
			<option label="Iowa" value="Iowa">Iowa</option>
			<option label="Kansas" value="Kansas">Kansas</option>
			<option label="Kentucky" value="Kentucky">Kentucky</option>
			<option label="Louisiana" value="Louisiana">Louisiana</option>
			<option label="Maine" value="Maine">Maine</option>
			<option label="Maryland" value="Maryland">Maryland</option>
			<option label="Massachusetts" value="Massachusetts">Massachusetts</option>
			<option label="Michigan" value="Michigan">Michigan</option>
			<option label="Minnesota" value="Minnesota">Minnesota</option>
			<option label="Mississippi" value="Mississippi">Mississippi</option>
			<option label="Missouri" value="Missouri">Missouri</option>
			<option label="Montana" value="Montana">Montana</option>
			<option label="Nebraska" value="Nebraska">Nebraska</option>
			<option label="Nevada" value="Nevada">Nevada</option>
			<option label="New Hampshire" value="NewHampshire">New Hampshire</option>
			<option label="New Jersey" value="NewJersey">New Jersey</option>
			<option label="New Mexico" value="NewMexico">New Mexico</option>
			<option label="New York" value="NewYork">New York</option>
			<option label="North Carolina" value="NorthCarolina">North Carolina</option>
			<option label="North Dakota" value="NorthDakota">North Dakota</option>
			<option label="Ohio" value="Ohio">Ohio</option>
			<option label="Oklahoma" value="Oklahoma">Oklahoma</option>
			<option label="Oregon" value="Oregon">Oregon</option>
			<option label="Pennsylvania" value="Pennsylvania">Pennsylvania</option>
			<option label="Rhode Island" value="RhodeIsland">Rhode Island</option>
			<option label="South Carolina" value="SouthCarolina">South Carolina</option>
			<option label="South Dakota" value="SouthDakota">South Dakota</option>
			<option label="Tennessee" value="Tennessee">Tennessee</option>
			<option label="Texas" value="Texas">Texas</option>
			<option label="Utah" value="Utah">Utah</option>
			<option label="Vermont" value="Vermont">Vermont</option>
			<option label="Virginia" value="Virginia">Virginia</option>
			<option label="Washington" value="Washington">Washington</option>
			<option label="West Virginia" value="WestVirginia">West Virginia</option>
			<option label="Wisconsin" value="Wisconsin">Wisconsin</option>
			<option label="Wyoming" value="Wyoming">Wyoming</option>
			<option label="District of Columbia" value="DistrictofColumbia">District of Columbia</option>
			<option label="Puerto Rico" value="PuertoRico">Puerto Rico</option>
			<option label="Guam" value="Guam">Guam</option>
			<option label="American Samoa" value="AmericanSamoa">American Samoa</option>
			<option label="U.S. Virgin Islands" value="USVirginIslands">U.S. Virgin Islands</option>
			<option label="Northern Mariana Islands" value="NorthernMarianaIslands">Northern Mariana Islands</option>
			<option label="New England" value="NewEngland">New England</option>
			<option label="New York Metro" value="NewYorkMetro">New York Metro</option>
			<option label="Midwest" value="Midwest">Midwest</option>
			<option label="Mid-Atlantic" value="MidAtlantic">Mid-Atlantic</option>
			<option label="North America" value="NorthAmerica">North America</option>
			<option label="Canada" value="Canada">Canada</option>
			<option label="Mexico" value="Mexico">Mexico</option>
		</select>
		<small class="form-text text-muted" id="regions_c_help">If your business is only active in certain states, you can command-click (Mac) or control-click (PC) to select more than one. </small>
	</div>


	<div class="form-group col-12">
		<label for="category_c">Category*</label>
		<select multiple class="form-control" id="category_c" aria-describedby="category_c_help" required>
			<option label="Local Professionals: Architects" value="Architects">Local Professionals: Architects</option>
			<option label="Local Professionals: Builders &amp; Remodelers" value="BuildersRemodelers">Local Professionals: Builders &amp; Remodelers</option>
			<option label="Local Professionals: Interior Designers" value="InteriorDesigners">Local Professionals: Interior Designers</option>
			<option label="Local Professionals: Kitchen Designers &amp; Builders" value="KitchenDesignersBuilders">Local Professionals: Kitchen Designers &amp; Builders</option>
			<option label="Local Professionals: Landscape Architects &amp; Designers" value="LandscapeArchitectsDesigners">Local Professionals: Landscape Architects &amp; Designers</option>
			<option label="Local Professionals: Landscape Design-Build Firms" value="LandscapeDesignBuildFirms">Local Professionals: Landscape Design-Build Firms</option>
			<option label="Local Professionals: Swimming Pool Designers &amp; Builders" value="SwimmingPoolDesignersBuilders">Local Professionals: Swimming Pool Designers &amp; Builders</option>
			<option label="Local Professionals: Tree Surgeons &amp; Arborists" value="TreeSurgeonsArborists">Local Professionals: Tree Surgeons &amp; Arborists</option>
			<option label="Stores: Appliance &amp; Grills" value="ApplianceGrills">Stores: Appliance &amp; Grills</option>
			<option label="Stores: Fences, Sheds, &amp; Playground" value="FencesShedsPlayground">Stores: Fences, Sheds, &amp; Playground</option>
			<option label="Stores: Hot Tubs &amp; Swim Spas" value="HotTubsSwimSpas">Stores: Hot Tubs &amp; Swim Spas</option>
			<option label="Stores: Nurseries &amp; Garden Centers" value="NurseriesGardenCenters">Stores: Nurseries &amp; Garden Centers</option>
			<option label="Stores: Outdoor Furniture Stores" value="OutdoorFurnitureStores">Stores: Outdoor Furniture Stores</option>
			<option label="Stores: Outdoor Lighting Stores" value="OutdoorLightingStores">Stores: Outdoor Lighting Stores</option>
			<option label="Stores: Swimming Pool Supplies" value="SwimmingPoolSupplies">Stores: Swimming Pool Supplies</option>
			<option label="Stores: Tile &amp; Countertops" value="TileCountertops">Stores: Tile &amp; Countertops</option>
			<option label="Stores: Windows &amp; Doors" value="WindowsDoors">Stores: Windows &amp; Doors</option>
			<option label="Manufacturers: Appliance &amp; Grill Manufacturers" value="ApplianceGrillManufacturers">Manufacturers: Appliance &amp; Grill Manufacturers</option>
			<option label="Manufacturers: Deck, Pergola &amp; Gazebo Manufacturers" value="DeckPergolaGazeboManufacturers">Manufacturers: Deck, Pergola &amp; Gazebo Manufacturers</option>
			<option label="Manufacturers: Garden Ornaments Manufacturers" value="GardenOrnamentsManufacturers">Manufacturers: Garden Ornaments Manufacturers</option>
			<option label="Manufacturers: Glass Enclosed Structures Manufacturers" value="GlassEnclosedStructuresManufacturers">Manufacturers: Glass Enclosed Structures Manufacturers</option>
			<option label="Manufacturers: Hot Tubs &amp; Swim Spa Manufacturers" value="HotTubsSwimSpaManufacturers">Manufacturers: Hot Tubs &amp; Swim Spa Manufacturers</option>
			<option label="Manufacturers: Kitchen Cabinets Manufacturers" value="KitchenCabinetsManufacturers">Manufacturers: Kitchen Cabinets Manufacturers</option>
			<option label="Manufacturers: Outdoor Furniture Manufacturers" value="OutdoorFurnitureManufacturers">Manufacturers: Outdoor Furniture Manufacturers</option>
			<option label="Manufacturers: Outdoor Lighting Manufacturers" value="OutdoorLightingManufacturers">Manufacturers: Outdoor Lighting Manufacturers</option>
			<option label="Manufacturers: Shade Products Manufacturers" value="ShadeProductsManufacturers">Manufacturers: Shade Products Manufacturers</option>
			<option label="Manufacturers: Stone &amp; Pavers Manufacturers" value="StonePaversManufacturers">Manufacturers: Stone &amp; Pavers Manufacturers</option>
			<option label="Manufacturers: Stone &amp; Pavers Manufacturers" value="SwimmingPoolAccessories">Manufacturers: Stone &amp; Pavers Manufacturers</option>
			<option label="Manufacturers: Swimming Pool Equipment &amp; Supplies" value="SwimmingPoolEquipmentSupplies">Manufacturers: Swimming Pool Equipment &amp; Supplies</option>
			<option label="Manufacturers: Window &amp; Door Manufacturers" value="WindowDoorManufacturers">Manufacturers: Window &amp; Door Manufacturers</option>
			<option label="Manufacturers: Media &amp; Tech, Entertainment" value="MediaTechEntertainment">Manufacturers: Media &amp; Tech, Entertainment</option>
			<option label="Associations" value="Associations">Associations</option>
		</select>
		<small class="form-text text-muted" id="category_c_help">If your business fits more than one category, you can command-click (Mac) or control-click (PC) to select more than one. </small>
	</div>


	<div class="form-group col-12">
		<label for="description">Description</label>
		<textarea class="form-control" id="description" rows="12" aria-describedby="description_help"></textarea>
		<small class="form-text text-muted" id="description_help">Describe your business here.. </small>
	</div>


	<div class="form-group col-12">
		<label for="award_textarea_c">Awards </label>
		<textarea class="form-control" id="award_textarea_c" rows="10" aria-describedby="award_textarea_c_help"></textarea>
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
		<input class="form-control" type="url" id="facebook_url_c">
	</div>


	<div class="form-group col-md-6">
		<label for="instagram_url_c">Instagram URL</label>
		<input class="form-control" type="url" id="instagram_url_c">
	</div>


	<div class="form-group col-md-6">
		<label for="twitter_url_c">Twitter URL</label>
		<input class="form-control" type="url" id="twitter_url_c">
	</div>


	<div class="form-group col-md-6">
		<label for="pinterest_url_c">Pinterest URL</label>
		<input class="form-control" type="url" id="pinterest_url_c">
	</div>


	<div class="form-group col-md-6">
		<label for="tumblr_url_c">Tumblr URL</label>
		<input class="form-control" type="url" id="tumblr_url_c">
	</div>


	<div class="form-group col-md-6">
		<label for="youtube_url_c">YouTube URL</label>
		<input class="form-control" type="url" id="youtube_url_c">
	</div>


	<div class="form-group col-md-6">
		<label for="google_plus_url_c">Google Plus URL</label>
		<input class="form-control" type="url" id="google_plus_url_c">
	</div>


	<div class="form-group col-md-6">
		<label for="linkedin_url_c">LinkedIn URL</label>
		<input class="form-control" type="url" id="linkedin_url_c">
	</div>

</div>
<!-- End Social Media -->

<hr>

<!-- Address -->
<div class="form-row">

	<h4 class="col-12">Main Location or Corporate Headquarters Address & Information</h4>

	<div class="form-group col-12">
		<label for="billing_address_street_1_c">Street Address* </label>
		<input class="form-control" type="text" id="billing_address_street_1_c">
	</div>


	<div class="form-group col-12">
		<label for="billing_address_street_2_c">Street Address 2 </label>
		<input class="form-control" type="text" id="billing_address_street_2_c">
	</div>


	<div class="form-group col-md-8">
		<label for="billing_address_city">City* </label>
		<input class="form-control" type="text" id="billing_address_city" required>
	</div>


	<div class="form-group col-md-4">
		<label for="billing_address_state_abbrev_c">State* </label>
		<select class="form-control" name="billing_address_state_abbrev_c" id="billing_address_state_abbrev_c" required>
			<option label="AK" value="AK">AK</option>
			<option label="AS" value="AS">AS</option>
			<option label="AZ" value="AZ">AZ</option>
			<option label="AR" value="AR">AR</option>
			<option label="CA" value="CA">CA</option>
			<option label="CO" value="CO">CO</option>
			<option label="CT" value="CT">CT</option>
			<option label="DE" value="DE">DE</option>
			<option label="DC" value="DC">DC</option>
			<option label="FL" value="FL">FL</option>
			<option label="GA" value="GA">GA</option>
			<option label="GU" value="GU">GU</option>
			<option label="HI" value="HI">HI</option>
			<option label="ID" value="ID">ID</option>
			<option label="IL" value="IL">IL</option>
			<option label="IN" value="IN">IN</option>
			<option label="IA" value="IA">IA</option>
			<option label="KS" value="KS">KS</option>
			<option label="KY" value="KY">KY</option>
			<option label="LA" value="LA">LA</option>
			<option label="ME" value="ME">ME</option>
			<option label="MD" value="MD">MD</option>
			<option label="MA" value="MA">MA</option>
			<option label="MI" value="MI">MI</option>
			<option label="MN" value="MN">MN</option>
			<option label="MS" value="MS">MS</option>
			<option label="MO" value="MO">MO</option>
			<option label="MT" value="MT">MT</option>
			<option label="NE" value="NE">NE</option>
			<option label="NV" value="NV">NV</option>
			<option label="NH" value="NH">NH</option>
			<option label="NJ" value="NJ">NJ</option>
			<option label="NM" value="NM">NM</option>
			<option label="NY" value="NY">NY</option>
			<option label="NC" value="NC">NC</option>
			<option label="ND" value="ND">ND</option>
			<option label="OH" value="OH">OH</option>
			<option label="OK" value="OK">OK</option>
			<option label="OR" value="OR">OR</option>
			<option label="PA" value="PA">PA</option>
			<option label="PR" value="PR">PR</option>
			<option label="RI" value="RI">RI</option>
			<option label="SC" value="SC">SC</option>
			<option label="SD" value="SD">SD</option>
			<option label="TN" value="TN">TN</option>
			<option label="TX" value="TX">TX</option>
			<option label="UT" value="UT">UT</option>
			<option label="VT" value="VT">VT</option>
			<option label="VI" value="VI">VI</option>
			<option label="VA" value="VA">VA</option>
			<option label="WA" value="WA">WA</option>
			<option label="WV" value="WV">WV</option>
			<option label="WI" value="WI">WI</option>
			<option label="WY" value="WY">WY</option>
		</select>
	</div>


	<div class="form-group col-md-8">
		<label for="billing_address_country">Country* </label>
		<input class="form-control" type="text" id="billing_address_country" required>
	</div>


	<div class="form-group col-md-4">
		<label for="billing_address_postalcode">Postal Code* </label>
		<input class="form-control" type="text" id="billing_address_postalcode">
	</div>


	<div class="form-group col-md-4">
		<label for="phone_office">Phone </label>
		<input class="form-control" type="text" id="phone_office">
	</div>


	<div class="form-group col-md-4">
		<label for="website">Website</label>
		<input class="form-control" type="url" id="website">
	</div>


	<div class="form-group col-md-4">
		<label for="Accounts0emailAddress0">Email Address*</label>
		<input type="email" class="form-control" id="Accounts0emailAddress0" aria-describedby="Accounts0emailAddress0_help">
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
		<input class="form-control" type="text" id="billing_contact_c">
	</div>


	<div class="form-group col-md-4">
		<label for="billing_phone_c">Billing Contact Phone* </label>
		<input class="form-control" type="text" id="billing_phone_c">
	</div>
	
	
	<div class="form-group col-md-4">
		<label for="billing_contact_email_c">Billing Contact Email* </label>
		<input type="email" class="form-control" id="billing_contact_email_c">
	</div> 

</div>
<!-- End Billing Contact Info -->



<!-- Set Date and Record Date Modified -->
<div class="form-group">
	<input class="form-control" type="hidden" id="date_modified" value="<?php echo date( 'Y-m-d H:i:s', current_time( 'timestamp', 0 ) ); ?>">
</div>



	<div class="text-center">
		<button type="button" class="btn btn-dark btn-lg">Submit</button>
	</div>

</form>


</div>
</div>
</div>