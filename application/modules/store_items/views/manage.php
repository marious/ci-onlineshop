<h1>Manage Items</h1>
<?php $this->load->view('includes/flash_messages'); ?>
<?php
 $create_item_url = base_url() . "store_items/create";
?>
	<p style="margin-top: 30px;">
	<a href="<?= $create_item_url; ?>">
		<button type="button" class="btn btn-primary">Add New Item</button></a>
	</p>

<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white tag"></i><span class="break"></span>Items Inventory</h2>
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>Item Title</th>
					  <th>Price</th>
					  <th>Was Price</th>
					  <th>Status</th>
					  <th>Actions</th>
				  </tr>
			  </thead>   
			  <tbody>
			  <?php if (count($items)): ?>
			  <?php foreach ($items as $item): ?>
				<tr>
					<td><?= e($item->item_title); ?></td>
					<td class="center"><?= $item->item_price; ?></td>
					<td class="center"><?= $item->was_price; ?></td>
					<td class="center">
						<?php if ($item->is_active): ?>
							<span class="label label-success">Active</span>
						<?php else: ?>
							<span class="label">In Active</span>
						<?php endif; ?>
					</td>
					<td class="center">
						<a class="btn btn-success" href="#">
							<i class="halflings-icon white zoom-in"></i>  
						</a>
						<a class="btn btn-info" href="<?= site_url("store_items/edit/" . $item->id); ?>">
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