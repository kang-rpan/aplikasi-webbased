<?php $this->load('header.php'); ?>
	<div id="book">		
		<h1>Daftar Buku</h1>
		<div class="list">
			<ul>
				<?php foreach($data as $row) : ?>
					<li><a href="<?php getUrl('product', 'view', $row['id']); ?>" title="produk"><?php echo $row['title']; ?></li>
				<?php endforeach; ?>
			</ul>	
		</div>
	</div>
<?php $this->load('footer.php'); ?>
