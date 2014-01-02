<?php
class Product
{
	public static function getData()
	{
		$data = array(
			array(
				'id' => '1',
				'id_cat' => '1',
				'title' => 'produk1',
				'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat'
			),
			array(
				'id' => '2',
				'id_cat' => '2',
				'title' => 'produk2',
				'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat'
			),
			array(
				'id' => '3',
				'id_cat' => '1',
				'title' => 'produk3',
				'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat'
			),
			array(
				'id' => '4',
				'id_cat' => '2',
				'title' => 'produk4',
				'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat'
			)
		);
		
		return $data;
	}
}
?>