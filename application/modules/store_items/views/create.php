<h1><?= $headline; ?></h1>

<?php if ($id): ?>
<div class="row-fluid">
	<div class="box span12">

		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white edit"></i><span class="break"></span>Item Options</h2>
			
		</div>
		<div class="box-content">
		
		<?php $this->load->view('includes/flash_messages'); ?>
			
			<?php if ($item->big_pic == ''): ?>
			<a href="<?= site_url("store_items/upload_image/$id") ?>">
				<button type="button" class="btn btn-primary">Upload Item Image</button>
			</a>
		   <?php else: ?>
		   	<a href="<?= site_url("store_items/delete_image/$id") ?>">
				<button type="button" class="btn btn-danger btn-setting">Delete Item Image</button>
			</a>
		   <?php endif; ?>

			<a href="<?= site_url("store_item_colors/update/$id") ?>">
				<button type="button" class="btn btn-primary">Update Item Colors</button>
			</a>
			<a href="<?= site_url("store_item_sizes/update/$id") ?>">
				<button type="button" class="btn btn-primary">Upload Item Sizes</button>
			</a>
			<a href="<?= site_url("store_items/") ?>">
				<button type="button" class="btn btn-primary">Upload Item Categories</button>
			</a>
			<a href="<?= site_url("store_items/deleteConf/$id") ?>">
				<button type="button" class="btn btn-danger">Delete Item</button>
			</a>
			<a href="<?= site_url("store_items/view/$id") ?>" class="btn">View Item In Shop</a>
		</div>
	</div><!--/span-->

</div><!--/row-->
<?php endif; ?>

<div class="row-fluid">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white edit"></i><span class="break"></span>Item Details</h2>
			
		</div>
		<div class="box-content">
		<?php
		$this->load->view('includes/validation_errors');
		?>
		<?= form_open("", array('class' => 'form-horizontal')); ?>
				<fieldset>
				  <div class="control-group">
					<label class="control-label" for="title">Item Title</label>
					<div class="controls">
					<?php
					$data = array(
							'name' => 'item_title',
							'class' => 'input-xlarge',
							'id' => 'title',
							'value' => set_value('item_title', $item->item_title),
							'placeholder' => 'Item Title',
						);
					?>
					  <?= form_input($data); ?>
					</div>
				  </div>

				    <div class="control-group">
					<label class="control-label" for="item_url">Item Url</label>
					<div class="controls">
					<?php
					$data = array(
							'name' => 'item_url',
							'class' => 'input-xlarge',
							'id' => 'item_url',
							'value' => set_value('item_title', $item->item_url),
							'placeholder' => 'Item Url',
						);
					?>
					  <?= form_input($data); ?>
					</div>
				  </div>

				   <div class="control-group">
					<label class="control-label" for="price">Item Price</label>
					<div class="controls">
					<?php
					$data = array(
							'name' => 'item_price',
							'class' => 'input span1',
							'id' => 'price',
							'value' => set_value('item_price', $item->item_price),
						);
					?>
					  <?= form_input($data); ?>
					</div>
				  </div>


				   <div class="control-group">
					<label class="control-label span1" for="was_price">Was Price 
						<span style="color: green;">Optional</span></label>
					<div class="controls">
					<?php
					$data = array(
							'name' => 'was_price',
							'class' => 'input span1',
							'id' => 'was_price',
							'value' => set_value('was_price', $item->was_price),
						);
					?>
					  <?= form_input($data); ?>
					</div>
				  </div>

				   <div class="control-group">
				    <?php
            		$on = (in_array($item->is_active, array('', '1'))  ? true : false);
            		$off = ($item->is_active === '0' ? true : false);
             		?>
				   	<label class="control-label span1" for="was_price">Active: </label>
					<label><input type="radio" value="1" name="is_active" id="active" 
					 <?= set_radio('is_active', '1', $on) ?>> Active </label>
					<label><input type="radio" value="0" name="is_active" id="inactive"
					 <?= set_radio('is_active', '0', $off) ?>> 
						In Active </label>

				   </div>
				 
				 <div class="control-group hidden-phone">
					  <label class="control-label" for="textarea2">Item Description</label>
					  <div class="controls">
						<textarea class="cleditor" id="item_description" rows="3" 
							name="item_description"
						><?= set_value('item_description', $item->item_description) ?></textarea>
					  </div>
					</div>
				
				  <div class="form-actions">
					<button type="submit" class="btn btn-primary">Save changes</button>
					<a href="<?= site_url('store_items/manage') ?>" class="btn">Cancel</a>
				  </div>
				</fieldset>
			  </form>
		
		</div>
	</div><!--/span-->

</div><!--/row-->

<?php if ($item->big_pic != ''): ?>
<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white tag"></i><span class="break"></span>Items Image</h2>
		</div>
		<div class="box-content">
			<img src="<?= site_url('assets/big_pics/' . $item->big_pic) ?>" alt="">
		</div>
	</div><!--/span-->

</div><!--/row-->


	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Are You Sure You Want Make This Action?</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="<?= site_url("store_items/delete_image/$id"); ?>" 
					class="btn btn-danger">Delete</a>
		</div>
	</div>

<?php endif; ?>

