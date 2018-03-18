<?php

	require './functions/log_page.php';

	$log = log_page($path);
	
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
		$page_title = 'Parsing Error';
		$content = '<h1>Parsing Error</h1><hr><p>The page you are requested can not be displayed due to parsing error.</p>';
	}

	include 'header.php';
	echo $content;
	include 'footer.php';
