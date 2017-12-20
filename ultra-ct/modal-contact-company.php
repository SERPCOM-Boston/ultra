<div class="modal fade" tabindex="-1" role="dialog" id="modal-contact-company">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
	  
      <div class="modal-body">
		  
       <h5 class="modal-title">Send a Message to <?php echo $account_details['name']; ?></h5>
	   
	   	<?php 
	   	$gravity_form = "[gravityform id=" . $account_details['gravity_form_id_c'] . " title=false name=false description=false]";
		?>
	   
        <?php echo do_shortcode($gravity_form); ?>

      </div>

    </div>
  </div>
</div>