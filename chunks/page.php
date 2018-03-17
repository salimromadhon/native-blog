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
		$page_title = 'Parsing Error';
		$content = '<h1>Parsing Error</h1><hr><p>The page you are requested can not be displayed due to parsing error.</p>';
	}

	include 'header.php';
	echo $content;
	include 'footer.php';
