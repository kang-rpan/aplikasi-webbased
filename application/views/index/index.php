<?php $this->load('header.php'); ?>
	<div id="book">		
		<h1>Kategori</h1>
		<div class="list">
		<ul>
			<li><a href="<?php getUrl('product'); ?>" title="produk">Semua</li>
			<?php foreach($data as $row) : ?>
				<li><a href="<?php getUrl('product', 'category', $row['id']); ?>" title="produk"><?php echo $row['title']; ?></li>
			<?php endforeach; ?>
		</ul>	
		</div>
	</div>
<?php $this->load('footer.php'); ?>
