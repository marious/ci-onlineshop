<div class="row">
	<div class="col-md-4" style="margin-top: 27px;">
		<img src="<?= site_url("assets/big_pics/{$item->big_pic}"); ?>" 
			alt="<?= e($item->item_title) ?>" class="img-responsive">
	</div>
	<div class="col-md-5">
		<h1><?= e($item->item_title); ?></h1>
		<div style="clear: both;">
			<?= nl2br($item->item_description); ?>
		</div>
	</div>
	<div class="col-md-3">
		<?= Modules::run('cart/_draw_add_to_cart', $item->id); ?>
	</div>
</div>