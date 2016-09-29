<h1><?= $headline; ?></h1>

<?php if ($id): ?>
<div class="row-fluid">
	<div class="box span12">

		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white edit"></i><span class="break"></span>Categories</h2>
			
		</div>
		<div class="box-content">
		<?php $this->load->view('includes/flash_messages'); ?>
	
		</div>
	</div><!--/span-->

</div><!--/row-->
<?php endif; ?>

<div class="row-fluid">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white edit"></i><span class="break"></span>Category Details</h2>
			
		</div>
		<div class="box-content">
		<?php
		$this->load->view('includes/validation_errors');
		?>
		<?= form_open("", array('class' => 'form-horizontal')); ?>
				<fieldset>
				  <div class="control-group">
					<label class="control-label" for="title">Category Title</label>
					<div class="controls">
					<?php
					$data = array(
							'name' => 'cat_title',
							'class' => 'input-xlarge',
							'id' => 'title',
							'value' => set_value('item_title', $category->cat_title),
							'placeholder' => 'Category Title',
						);
					?>
					  <?= form_input($data); ?>
					</div>
				  </div>
				
				<?php if ($num_dropdown_options > 1): ?>	
				  <div class="control-group">
				  	<label for="parent_id" class="control-label">Parent Category</label>
				  	<div class="controls">
				  		<?php
				  		$additional = 'id="selectError3"';
				  		echo form_dropdown('parent_cat_id', $options, $category->parent_cat_id, $additional);
				  		?>
				  	</div>
				  </div>
				<?php else: ?>
					<?php echo form_hidden('parent_cat_id', 0); ?>
				<?php endif; ?>
				
				  <div class="form-actions">
					<button type="submit" class="btn btn-primary">Save changes</button>
					<a href="<?= site_url('store_categories/manage') ?>" class="btn">Cancel</a>
				  </div>
				</fieldset>
			  </form>
		
		</div>
	</div><!--/span-->

</div><!--/row-->



