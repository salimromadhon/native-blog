<?php

	require './functions/log_page.php';

	$log = log_page();
	
	// Due to the `index.php`, this conditional actually is not needed.
	if ($log !== FALSE)
	{
		require './functions/Parsedown.php';
		$Parsedown = new Parsedown();
		$Parsedown->setSafeMode($config['safe_text']);

		$page_title = $log['title'];

		$content = '<div class="log">'
			.'<h1>'.$Parsedown->line($log['title']).'</h1>'
			.'<p style="font-size:.8em; font-style:italic">'.$log['date'].' &middot; '.$log['time'].'</p>'
			.'<hr>'
			.$Parsedown->text($log['content'])
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
