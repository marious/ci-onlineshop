<h1><?= $headline; ?></h1>
<div class="row-fluid">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white edit"></i><span class="break"></span><?= $headline ?></h2>
		</div>
		<div class="box-content">
		<?php $this->load->view('includes/validation_errors'); ?>
			<p>Update Account Password?</p>
			<?php echo form_open('store_accounts/update_pword/' . $id, array("class" => 'form-horizontal'));?>
				  <fieldset>
				  	   <div class="control-group">
				  		<label class="control-label" for="pword">Password</label>
				  		<div class="controls">
				  		<?php
				  		$data = array(
				  				'name' => 'pword',
				  				'class' => 'input-xlarge',
				  				'id' => 'pword',
				  				'placeholder' => 'Password'
				  			);
				  		?>
				  		  <?= form_password($data); ?>
				  		</div>
				  	  </div>

				  	  <div class="control-group">
				  		<label class="control-label" for="password_confirm">Confirm Password</label>
				  		<div class="controls">
				  		<?php
				  		$data = array(
				  				'name' => 'confirm_pword',
				  				'class' => 'input-xlarge',
				  				'id' => 'password_confirm',
				  				'placeholder' => 'Confirm Password',
				  			);
				  		?>
				  		  <?= form_password($data); ?>
				  		</div>
				  	  </div>

				    <div class="form-actions">
						<button type="submit" class="btn btn-primary">Save</button>
				  		<a href="<?= site_url("store_accounts/edit/" . $id) ?>" class="btn">
				  		Cancel
				  		</a>
				  	</div>
				  </fieldset>
				  
				</form> 
		</div>
 
	</div><!--/span-->

</div><!--/row-->