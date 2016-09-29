<h1><?= $headline ?></h1>
<div class="row-fluid">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white edit"></i><span class="break"></span>New Color Options</h2>
			
		</div>
		<div class="box-content">
		<?php $this->load->view('includes/flash_messages'); ?>
		<p>Submit a new options as required. When you finished adding new options, press 'Finished'.</p>

			<?= form_open("store_item_colors/submit/$id", array('class' => 'form-horizontal')); ?>
			<fieldset>
				<div class="control-group">
					<label for="option" class="control-label">New Option </label>
					<div class="controls">
						<input type="text" name="color" id="option">
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


<?php if (count($colors)): ?>
<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white edit"></i><span class="break"></span>Existing Color Options</h2>
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>Count</th>
					  <th>Color</th>
					  <th>Action</th>
				  </tr>
			  </thead>   
			  <tbody>
			  <?php $count = 0; ?>
			  <?php foreach ($colors as $color): ?>
			  	<?php $count++; ?>
				<tr>
					<td><?= $count; ?></td>
					<td><?= $color->color; ?></td>					
					<td class="center">
						<a class="btn btn-danger" 
							href="<?= site_url("store_item_colors/delete/$color->id"); ?>">
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
