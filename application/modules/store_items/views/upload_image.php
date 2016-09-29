<h1><?= $headline ?></h1>
<div class="row-fluid">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white edit"></i><span class="break"></span><?= $headline ?></h2>
			
		</div>
		<div class="box-content">

<?php echo form_open_multipart('store_items/do_upload/' . $id, array("class" => 'form-horizontal'));?>

<?php $this->load->view('includes/flash_messages'); ?>

	<p style="margin-top: 24px;">Please Choose a file from your computer and then press 'Upload'.</p>

	  <fieldset>
		<div class="control-group">
		  <label class="control-label" for="fileInput">File input</label>
		  <div class="controls">
			<input class="input-file uniform_on" name="photo" id="fileInput" type="file">
		  </div>
		</div>          
	  </fieldset>
	  <div class="form-actions">
	  	<button type="submit" class="btn btn-primary">Upload</button>	  	
	  	<a href="<?= site_url("store_items/edit/" . $id) ?>" class="btn">
	  		Cancel
	  	</a>
	  </div>
	</form>   
	</div><!--/span-->

</div><!--/row-->