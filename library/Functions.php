<?php
function baseUrl($key = null)
{	
	$base = array(
		'css' => '/css',
		'js'  => '/js',
		'img' => '/images'
	);
	
	$path = ($key) ? $base[$key] : '';
	print URL . '/public' . $path;
}

function getUrl()
{
	$args = func_get_args();
	print URL . '/' . join('/', $args);
}

?>