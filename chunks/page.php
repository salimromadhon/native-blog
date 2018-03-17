<?php

	require './functions/page.php';

	$page = page();
	
	if ($page !== FALSE)
	{
		require './functions/Parsedown.php';
		$Parsedown = new Parsedown();
		$Parsedown->setSafeMode($config['safe_text']);

		$page_title = $page['title'];

		$content = '<div class="page">'
			.'<h1>'.$Parsedown->line($page['title']).'</h1>'
			.'<hr>'
			.$Parsedown->text($page['content'])
			.'</div>';
	}
	else
	{
		header('HTTP/1.0 404 Not Found');
		$page_title = 'Not Found';
		$content = '<h1>Not Found</h1><hr><p>The page you are requested is not found.</p>';
	}

	include 'header.php';
	echo $content;
	include 'footer.php';
