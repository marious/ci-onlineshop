<ul id="sortlist">
<?php $this->load->module('store_categories');?>
<?php foreach ($categories as $category){ 
	$parent_cat_title = $this->store_categories->_get_parent_cat_title($category->parent_cat_id);
	$num_sub_cats = $this->store_categories->_count_sub_cats($category->id);
?>
	<li class="sort" id="<?= $category->id; ?>"><i class="icon-sort"></i> <?= $category->cat_title; ?>
	<?= $parent_cat_title; ?>
	<?php
	if ($num_sub_cats < 1) {
		echo '&nbsp;';
	} else {
		$entity = ($num_sub_cats == 1) ? 'Category' : 'Categories';
	?>
		<a class="btn btn-default" href="<?= site_url("store_categories/manage/{$category->id}") ?>">
			<?php echo $num_sub_cats . ' ' . $entity; ?>
		</a>
			<a class="btn btn-info" href="<?= site_url("store_categories/edit/" . $category->id); ?>">
							<i class="halflings-icon white edit"></i>  
		</a>
	<?php 
	}
	?>
	</li>
<?php } ?>
</ul>