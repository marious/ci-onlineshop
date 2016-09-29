<h1>Manage Categories</h1>
<?php $this->load->view('includes/flash_messages'); ?>
<?php
 $create_item_url = base_url() . "store_categories/create";
?>
	<p style="margin-top: 30px;">
	<a href="<?= $create_item_url; ?>">
		<button type="button" class="btn btn-primary">Add New Category</button></a>
	</p>

<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="white icon-align-justify"></i><span class="break"></span>Existing Categories</h2>
		</div>
		<div class="box-content">
		<?php  echo Modules::run('store_categories/_draw_sortable_list', $parent_cat_id) ?>         
		</div>
	</div><!--/span-->

</div><!--/row-->