<?php if (validation_errors()): ?>
<div class="alert alert-error">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<?= validation_errors(); ?>
</div>
<?php endif; ?>