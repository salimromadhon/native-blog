<?php
	
	require 'functions/basics.php';
	require 'functions/minify.php';

	ob_start('minify');

	/*
	 * -------------------
	 * SITE CONFIGURATIONS
	 * -------------------
	 */
	$config = array(
		'base_url'		=> 'http://localhost/native-blog', // Without trailing slash (/)
		'site_title'	=> 'Salim Romadhon',
		'safe_text'		=> TRUE // Safe mode for Parsedown
	);

	$path = path();

	if ($path != NULL)
		$content_path = 'contents/'.implode('/', $path);

	if ($path == NULL)
	{
		// Show homepage
		header('location: home');
	}
	elseif (file_exists($content_path.'.page.md'))
	{
		// Show page content
		include 'chunks/page.php';
	}
	elseif (file_exists($content_path.'.log.md'))
	{
		// Show log content
		include 'chunks/log_page.php';
	}
	elseif (is_dir($content_path))
	{
		// Show log index (logs)
		include 'chunks/log_index.php';
	}
	else
	{
		// Show error content
		header('HTTP/1.0 404 Not Found');
		include 'chunks/error.php';
	}
