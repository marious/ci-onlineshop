<h1><?= $headline ?></h1>
<div class="row-fluid">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white edit"></i><span class="break"></span>New size Options</h2>
			
		</div>
		<div class="box-content">
		<?php $this->load->view('includes/flash_messages'); ?>
		<p>Submit a new options as required. When you finished adding new options, press 'Finished'.</p>

			<?= form_open("store_item_sizes/submit/$id", array('class' => 'form-horizontal')); ?>
			<fieldset>
				<div class="control-group">
					<label for="option" class="control-label">New Option </label>
					<div class="controls">
						<input type="text" name="size" id="option">
					</div>
				</div>
				<div class="form-actions">
					<button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
					<button type="submit" name="submit" class="btn" value="finished">Finished</button>
				</div>
			</fieldset>
			<?= form_close(); ?>

		</div>
		 
	</div><!--/span-->

</div><!--/row-->


<?php if (count($sizes)): ?>
<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white edit"></i><span class="break"></span>Existing size Options</h2>
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>Count</th>
					  <th>size</th>
					  <th>Action</th>
				  </tr>
			  </thead>   
			  <tbody>
			  <?php $count = 0; ?>
			  <?php foreach ($sizes as $size): ?>
			  	<?php $count++; ?>
				<tr>
					<td><?= $count; ?></td>
					<td><?= $size->size; ?></td>					
					<td class="center">
						<a class="btn btn-danger" 
							href="<?= site_url("store_item_sizes/delete/$size->id"); ?>">
							<i class="halflings-icon white trash"></i>  
						</a>
					</td>
				</tr>
				<?php endforeach; ?>		
			  </tbody>
		  </table>            
		</div>
	</div><!--/span-->

</div><!--/row-->

<?php endif; ?>
