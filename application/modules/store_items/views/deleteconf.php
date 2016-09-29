<h1><?= $headline; ?></h1>
<div class="row-fluid">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white edit"></i><span class="break"></span><?= $headline ?></h2>
			
		</div>
		<div class="box-content">
			<p>Are you sure that you want delete the item?</p>
			<?php echo form_open('store_items/delete/' . $id, array("class" => 'form-horizontal'));?>
				  <fieldset>
				  	<input  name="delete" type="submit" class="btn btn-danger" value="Delete">
				  	<a href="<?= site_url("store_items/edit/" . $id) ?>" class="btn">
				  		Cancel
				  	</a>
				  </fieldset>
				  
				</form> 
		</div>
 
	</div><!--/span-->

</div><!--/row-->