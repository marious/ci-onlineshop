<div style="background: #ddd; border-radius: 7px; margin-top: 27px; padding: 7px;">
	<table class="table">
		<tr>
			<td colspan="2">Item Id: <?= $item_id; ?></td>
		</tr>
		<?php if ($num_colors): ?>
		<tr>
			<td>Color: </td>
			<td>
				<div class="col-sm-10">
				<?= form_dropdown('color', $color_options, $submitted_color, array('class' => 'form-control')); ?>
				</div>
			</td>
		</tr>
	<?php endif; ?>
	<?php if ($num_sizes): ?>
		<tr>
			<td>Size: </td>
			<td>
				<div class="col-sm-10">
				<?= form_dropdown('size', $size_options, $submitted_size, array('class' => 'form-control')); ?>
				</div>
			</td>
		</tr>
	<?php endif; ?>
		<tr>
			<td>Qty: </td>
			<td>
				<div class="col-sm-8">
					<input type="number" name="qty" class="form-control" min="1">
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="2" style="text-align: center;">
				<button class="btn btn-primary" type="submit">
				<span class="glyphicon glyphicon-shopping-cart"></span> Add To Basked
				</button>
			</td>
		</tr>
	</table>
</div>