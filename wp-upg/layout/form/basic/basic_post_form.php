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
<form class="pure-form pure-form-stacked" method="post" enctype="multipart/form-data" action="">
<fieldset>
        <div class="pure-control-group">
            <label for="name">Photo Caption</label>
            <input class="pure-input-1 pure-input-rounded" id="name" name="user-submitted-title" type="text" value="" placeholder="Photo Caption" required>
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
			
			<textarea class="pure-input-1 pure-input-rounded" id="desp"  name="user-submitted-content" rows="5" placeholder="<?php _e('Post Content', 'wp-upg'); ?>" required></textarea>
			  </div>
			<?php 
			}

				}
			else
			{
				echo "<input type='hidden' name='user-submitted-content' value='No Information'> ";
			}
						?>
		   
		   
      
		<div class="pure-control-group">
            <label for="cat">Select Gallery</label>
           <?php echo upg_droplist_category(); ?>
		   </div>
		   
		   <div class="pure-control-group">
            <label for="tags">Category</label>
			 <?php 
			// $args = array('orderby' => 'name');
			 //wp_dropdown_categories($args );
			$taxonomy = 'category';
            // Add filter to change the default taxonomy
            $taxonomy = apply_filters( 'wpmediacategory_taxonomy', $taxonomy );
            if ( $taxonomy != 'category' ) {
                $dropdown_options = array(
                    'taxonomy'        => $taxonomy,
                    'name'            => $taxonomy,
                    'show_option_all' => __( 'View all categories', 'wp-media-library-categories' ),
                    'hide_empty'      => false,
                    'hierarchical'    => true,
                    'orderby'         => 'name',
                    'show_count'      => true,
                    'walker'          => new wpmediacategory_walker_category_filter(),
                    'value'           => 'slug'
                );
            } else {
                $dropdown_options = array(
                    'taxonomy'        => $taxonomy,
                    'show_option_all' => __( 'View all categories', 'wp-media-library-categories' ),
                    'hide_empty'      => false,
                    'hierarchical'    => true,
                    'orderby'         => 'name',
                    'show_count'      => false,
                    'walker'          => new wpmediacategory_walker_category_filter(),
                    'value'           => 'id'
                );
            }
            wp_dropdown_categories( $dropdown_options );
			 ?>
        </div> 
		
		   

		  
        </div>
		<div class="pure-control-group">
            <label for="tags">Tags</label><br />
			<textarea name="tags" id="tags"></textarea>
			<p class="howto" id="new-tag-post_tag-desc">Separate tags with commas</p>
        </div>
		
		
		
		<div class="pure-control-group">
		
            <?php
			$put="";
			ob_start ();
				?>
					<label for="file"><?php _e('Select Image', 'wp-upg'); ?></label>
				  <input class="pure-input-1-2 pure-input-rounded" id="file" name="user-submitted-image[]" type="file" size="25" 
				  <?php
					if($options['image_required']=='1')
					{
						echo "required";
					}
					?>>
				
				<?php
			$put=ob_get_clean (); 
			echo apply_filters('upg_bulk_limit_submit_form',$put);

			?>
			
		
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
					<input type="text" name="upg_custom_field_<?php echo $x; ?>" class="pure-input-1 pure-input-rounded">
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
</fieldset>
</form>	
	
