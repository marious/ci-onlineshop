
<div class="row-fluid">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white edit"></i><span class="break"></span><?= $headline ?></h2>
			
		</div>
		<div class="box-content">
			<div class="alert alert-success">Your File is successfully uploaded.</div>
			<ul>
				<?php foreach ($data['upload_data'] as $item => $value): ?>
					<li><?= $item ?> : <?= $value; ?></li>
				<?php endforeach; ?>
			</ul>
			<p>
				<a href="<?= site_url("store_items/edit/" . $id) ?>" class="btn btn-primary">
					Return to Main Item Page
				</a>
			</p>
		</div>
 
	</div><!--/span-->

</div><!--/row-->