<script>
function updateCatName(){
	var elt = document.getElementById('gallery');
	 if (elt.selectedIndex != -1) {
		document.getElementById('cat_name').value = elt.options[elt.selectedIndex].text;
	 }
	 
	 window.onload = function(){
		 updateCatName();
	 }
}
</script>
<div class="container edit_profile_form_container">
	<div class="row">
		<div class="col-xs-12 col-lg-8 offset-lg-2">

<p><a href="https://ultraoutdoors.net/ultra/edit-profile/">Edit Profile »</a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="https://ultraoutdoors.net/ultra/edit-slideshow/">Manage Slideshow »</a></p>

<form class="pure-form pure-form-stacked" method="post" enctype="multipart/form-data" action="">
<fieldset>
        <div class="pure-control-group">
            <label for="name">Photo Description</label>
            <input class="pure-input-1" id="name" name="user-submitted-title" type="text" value="" placeholder="Photo Description" required>
        </div>


		   <?php 
		    if($options['primary_show_formshow_desp']=='1')
			{
				
		   if ($editor) 
		    { ?>
				<div class="pure-controls">
					<div class="usp_text-editor">
			<?php $settings = array(
				    'wpautop'          => true,  // enable rich text editor
				    'media_buttons'    => false,  // enable add media button
				    'textarea_name'    => 'user-submitted-content', // name
				    'textarea_rows'    => '10',  // number of textarea rows
				    'tabindex'         => '',    // tabindex
				    'editor_css'       => '',    // extra CSS
				    'editor_class'     => 'usp-rich-textarea', // class
				    'teeny'            => false, // output minimal editor config
				    'dfw'              => false, // replace fullscreen with DFW
				    'tinymce'          => true,  // enable TinyMCE
				    'quicktags'        => true,  // enable quicktags
				    'drag_drop_upload' => true, // enable drag-drop
				);
				wp_editor('', 'upgcontent', apply_filters('upg_editor_settings', $settings)); ?>
				
				</div>
			</div>
			<?php 
			} 
			else 
			{ 
		?>
		  <div class="pure-control-group">
				 <label for="desp"><?php _e('Description', 'wp-upg'); ?></label>
			
			<textarea class="pure-input-1" id="desp"  name="user-submitted-content" rows="5" placeholder="<?php _e('Post Content', 'wp-upg'); ?>" required></textarea>
			  </div>
			<?php 
			}

			}
			else
			{
				echo "<input type='hidden' name='user-submitted-content' value=''> ";
			}
			?>

		
		   
       
		<div class="pure-control-group">
            <label for="tags">Tags</label>
			<textarea name="tags" id="tags" rows="3" style="height: auto;"></textarea>
			<p class="howto" id="new-tag-post_tag-desc">Separate tags with commas</p>
        </div>


      
		<div class="pure-control-group">
            <label for="cat">Select Gallery</label>
           <?php echo str_replace('"cat"', '"gallery"', upg_droplist_category()); ?>
		   </div>
		   
		   <div class="pure-control-group">
            <label for="tags">Category</label>
			 <?php 
			// $args = array('orderby' => 'name');
			 //wp_dropdown_categories($args );
			$taxonomy = 'category';
            // Add filter to change the default taxonomy
            $taxonomy = apply_filters( 'wpmediacategory_taxonomy', $taxonomy );
			//251 -- Photos Subcat
            if ( $taxonomy != 'category' ) {
                $dropdown_options = array(
                    'taxonomy'        => $taxonomy,
                    'name'            => $taxonomy,
                    'show_option_all' => '',
                    'hide_empty'      => false,
                    'hierarchical'    => true,
                    'orderby'         => 'name',
					'child_of'  	  => 251,
                    'show_count'      => true,
                    'walker'          => new wpmediacategory_walker_category_filter(),
                    'value'           => 'slug',
					 'echo'               => false,
                );
            } else {
                $dropdown_options = array(
                    'taxonomy'        => $taxonomy,
                    'show_option_all' => '',
                    'hide_empty'      => false,
                    'hierarchical'    => true,
                    'orderby'         => 'name',
					'child_of'  	  => 251,
                    'show_count'      => false,
                    'walker'          => new wpmediacategory_walker_category_filter(),
                    'value'           => 'id',
					 'echo'               => false,
                );
            }
          //  wp_dropdown_categories( $dropdown_options );
			$cat_dropdown = wp_dropdown_categories( $dropdown_options );

			$cat_dropdown = preg_replace( 
					'^' . preg_quote( '<select ' ) . '^', 
					'<select required ', 
					$cat_dropdown
				);

			$cat_dropdown = preg_replace( '/<select (.*?) >/', '<select $1 size="26" multiple>', $cat_dropdown);
			
			echo  str_replace("name='cat'", "name='cat[]'", $cat_dropdown);
			//wp_category_checklist(0,251);
			
			 ?>
			<p class="howto">Command-click (Mac) or control-click (PC)  to select more than one category</p>
        </div> 	



		  <ul>
		  <li><?php echo _e('Only picture files are allowed.','wp-upg') ?></li>
		  <li><?php echo _e('Maximum upload file size limit is','wp-upg') ?> <b><?php //echo ini_get('post_max_size'); ?> <?php echo size_format( wp_max_upload_size() ); ?></b></li>
		  </ul>
        
		
		<?php
		//Display 5 custom fields loop
		for ($x = 1; $x <= 5; $x++) 
		{
			if($options['upg_custom_field_'.$x.'_show_front']=='on')
			{
				if($options['upg_custom_field_type_'.$x]=='checkbox')
				{
					?>
					<div class="pure-control-group">
					<label for="upg_custom_field_<?php echo $x; ?>" class="pure-checkbox"> 
					<input type="checkbox" name="upg_custom_field_<?php echo $x; ?>" value="<?php echo 'upg_custom_field_'.$x.'_checked'; ?>" >
					<?php echo $options['upg_custom_field_'.$x]; ?> 
					
					</label> 
					
					</div>
					<?php
				}
				else
				{
			?>
			<div class="pure-control-group">
				<label for="upg_custom_field_<?php echo $x; ?>">
				<?php echo $options['upg_custom_field_'.$x]; ?> </label>
				<input type="text" name="upg_custom_field_<?php echo $x; ?>" class="pure-input-1">
			</div>
			
		<?php
				}
			}
		}
		
		?>
		
		
		<?php
		do_action( "upg_submit_form");
		?>
		
		
		 <div class="pure-controls">
			<button type="submit" name="SN" class="pure-button pure-button-primary"><i class="fa fa-upload fa-lg"></i> <?php esc_html_e( 'Post', 'wp-upg' ); ?></button>
			<?php wp_nonce_field('upg-nonce', 'upg-nonce', false); ?>
		</div>
		
		
		<div class="pure-control-group">
            <?php
			$put="";
			ob_start ();
			?>
				<div id="images">
					<label for="file_1"><?php _e('Select Image', 'wp-upg'); ?></label>
				  	<input class="pure-input-1-2 pure-input-rounded" id="file_1" name="user-submitted-image-1[]"  type="file" size="25" required>
				</div>

				<hr>
				<h4>Want to post multiple photos at once? Click the button below. </h4>

		 		<ul>
		 		<li>All photos posted will get the same Description, Categories and Tags (and will go in the same Gallery, if applicable).</li>
		 		<li>If this is not desired (i.e. you want to write individual Descriptions or select different Categories, Tags or Galleries), you will need to post your photos one at a time.</li>
		 		</ul>


				<button type="button" onclick="addimages();" class="pure-button pure-button-primary">Add More Images</button>

				<input type="hidden" id="image_count" name="image_count" value="1">
				
				<script>
				
				function addimages(){
					var img_cnt = 1 + parseInt(document.getElementById("image_count").value);
					var img_html = '<label for="file_' + img_cnt + '">Select Image </label><input class="pure-input-1-2 pure-input-rounded" id="file_' + img_cnt + '" name="user-submitted-image-' + img_cnt + '[]" type="file" size="25" >';
					
					document.getElementById('images').insertAdjacentHTML('beforeend', img_html);
					document.getElementById("image_count").value = img_cnt;
					
				}
				
				</script>
			<?php
			$put=ob_get_clean (); 
			echo apply_filters('upg_bulk_limit_submit_form',$put);
			?>
		</div>
		
		 </div>
</fieldset>
</form>	
	
</div>
</div>
</div>