<h1>Manage Accounts</h1>
<?php $this->load->view('includes/flash_messages'); ?>
<?php
 $create_item_url = base_url() . "store_accounts/create";
?>
	<p style="margin-top: 30px;">
	<a href="<?= $create_item_url; ?>">
		<button type="button" class="btn btn-primary">Add New Account</button></a>
	</p>

<div class="row-fluid">		
<div class="box span12">
	<div class="box-header" data-original-title>
		<h2><i class="halflings-icon white briefcase"></i><span class="break"></span>
			Customer Accounts</h2>
	</div>
	<div class="box-content">
		<table class="table table-striped table-bordered bootstrap-datatable datatable">
		  <thead>
			  <tr>
				  <th>First Name</th>
				  <th>Last Name</th>
				  <th>Company</th>
				  <th>Date Created</th>
				  <th>Actions</th>
			  </tr>
		  </thead>   
		  <tbody>
		  <?php if (count($accounts)): ?>
		  <?php foreach ($accounts as $account): ?>
			<tr>
				<td><?= $account->firstname; ?></td>
				<td><?= $account->lastname; ?></td>
				<td><?= $account->company; ?></td>
				<td><?= get_nice_date($account->created_at, 'cool'); ?></td>
				<td class="center">
					<a class="btn btn-info" href="<?= site_url("store_accounts/edit/" . $account->id); ?>">
						<i class="halflings-icon white edit"></i>  
					</a>
				</td>
			</tr>
			<?php endforeach; ?>
		<?php endif; ?>
			
			
		  </tbody>
	  </table>            
	</div>
</div><!--/span-->

</div><!--/row-->