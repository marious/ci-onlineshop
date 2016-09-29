<h1><?= $headline; ?></h1>
<?php if ($id): ?>
<div class="row-fluid">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white edit"></i><span class="break"></span>Account Options</h2>
		</div>
		<div class="box-content">
		<?php $this->load->view('includes/flash_messages'); ?>
			<a href="<?= site_url("store_accounts/update_pword/$id") ?>">
				<button type="button" class="btn btn-primary">Update Password</button>
			</a>
			<button type="button" class="btn btn-danger btn-setting">Delete Account</button>
		</div>
	</div><!--/span-->

</div><!--/row-->
<?php endif; ?>

<div class="row-fluid">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white edit"></i><span class="break"></span>Account Details</h2>
			
		</div>
		<div class="box-content">
		<?php
		$this->load->view('includes/validation_errors');
		?>
		<?= form_open("", array('class' => 'form-horizontal')); ?>
				<fieldset>
				  <div class="control-group">
					<label class="control-label" for="firstname">First Name</label>
					<div class="controls">
					<?php
					$data = array(
							'name' => 'firstname',
							'class' => 'input-xlarge',
							'id' => 'firstname',
							'value' => set_value('firstname', $account->firstname),
							'placeholder' => 'First Name',
						);
					?>
					  <?= form_input($data); ?>
					</div>
				  </div>


				   <div class="control-group">
					<label class="control-label" for="lastname">Last Name</label>
					<div class="controls">
					<?php
					$data = array(
							'name' => 'lastname',
							'class' => 'input-xlarge',
							'id' => 'lastname',
							'value' => set_value('lastname', $account->lastname),
							'placeholder' => 'Last Name',
						);
					?>
					  <?= form_input($data); ?>
					</div>
				  </div>

				  <div class="control-group">
					<label class="control-label" for="company">Company</label>
					<div class="controls">
					<?php
					$data = array(
							'name' => 'company',
							'class' => 'input-xlarge',
							'id' => 'company',
							'value' => set_value('company', $account->company),
							'placeholder' => 'Company',
						);
					?>
					  <?= form_input($data); ?>
					</div>
				  </div>

				   <div class="control-group">
					<label class="control-label" for="address1">Address 1</label>
					<div class="controls">
					<?php
					$data = array(
							'name' => 'address1',
							'class' => 'input-xlarge',
							'id' => 'address1',
							'value' => set_value('address1', $account->address1),
							'placeholder' => 'Address 1',
						);
					?>
					  <?= form_input($data); ?>
					</div>
				  </div>

				   <div class="control-group">
					<label class="control-label" for="address2">Address 2</label>
					<div class="controls">
					<?php
					$data = array(
							'name' => 'address2',
							'class' => 'input-xlarge',
							'id' => 'address2',
							'value' => set_value('address2', $account->address2),
							'placeholder' => 'Address 2',
						);
					?>
					  <?= form_input($data); ?>
					</div>
				  </div>

				    <div class="control-group">
					<label class="control-label" for="city">Ciity</label>
					<div class="controls">
					<?php
					$data = array(
							'name' => 'city',
							'class' => 'input-xlarge',
							'id' => 'city',
							'value' => set_value('city', $account->city),
							'placeholder' => 'City',
						);
					?>
					  <?= form_input($data); ?>
					</div>
				  </div>


				  <div class="control-group">
					<label class="control-label" for="country">Country</label>
					<div class="controls">
					<?php
					$data = array(
							'name' => 'country',
							'class' => 'input-xlarge',
							'id' => 'country',
							'value' => set_value('country', $account->country),
							'placeholder' => 'Country',
						);
					?>
					  <?= form_input($data); ?>
					</div>
				  </div>

				   <div class="control-group">
					<label class="control-label" for="postcode">PostCode</label>
					<div class="controls">
					<?php
					$data = array(
							'name' => 'postcode',
							'class' => 'input-xlarge',
							'id' => 'postcode',
							'value' => set_value('postcode', $account->postcode),
							'placeholder' => 'PostCode',
						);
					?>
					  <?= form_input($data); ?>
					</div>
				  </div>


				   <div class="control-group">
					<label class="control-label" for="telnum">Telephone Number</label>
					<div class="controls">
					<?php
					$data = array(
							'name' => 'telnum',
							'class' => 'input-xlarge',
							'id' => 'telnum',
							'value' => set_value('telnum', $account->telnum),
							'placeholder' => 'Telephone Number',
						);
					?>
					  <?= form_input($data); ?>
					</div>
				  </div>


				   <div class="control-group">
					<label class="control-label" for="email">Email Address</label>
					<div class="controls">
					<?php
					$data = array(
							'name' => 'email',
							'type' => 'email',
							'class' => 'input-xlarge',
							'id' => 'email',
							'value' => set_value('email', $account->email),
							'placeholder' => 'Email Address',
						);
					?>
					  <?= form_input($data); ?>
					</div>
				  </div>

				<?php if (!$id): ?>
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
							'name' => 'password_confirm',
							'class' => 'input-xlarge',
							'id' => 'password_confirm',
							'placeholder' => 'Confirm Password',
						);
					?>
					  <?= form_password($data); ?>
					</div>
				  </div>
				<?php endif; ?>
				
				  <div class="form-actions">
					<button type="submit" class="btn btn-primary">Save changes</button>
					<a href="<?= site_url('store_accounts/manage') ?>" class="btn">Cancel</a>
				  </div>
				</fieldset>
			  </form>
		
		</div>
	</div><!--/span-->

</div><!--/row-->

<?php if (isset($id)): ?>
	<?php
	echo alert_modal($id, 'store_accounts/delete_account/' . $id);
	?>
<?php endif; ?>