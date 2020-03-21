<?php

	require './functions/Parsedown.php';
	$Parsedown = new Parsedown();
	$Parsedown->setSafeMode($config['safe_text']);

	$logs_path	= implode('/', $path);
	$logs		= glob('./contents/'.$logs_path.'/*.log.md');

	$output = array();

	for ($i = 0; $i < count($logs); $i++)
	{
		$slug		= basename($logs[$i], '.log.md'); // return filename
		$logs[$i]	= file_get_contents($logs[$i]);
		$logs[$i]	= explode('----', $logs[$i], 5);

		$error = FALSE;

		for ($j = 0; ($j < 5) AND ( ! $error); $j++)
		{
			if (( ! isset($logs[$i][$j])) OR (trim($logs[$i][$j]) == NULL))
				$error = TRUE;
		}

		// Assign visible `$article` into `$output` based on time
		if (( ! $error) AND ($logs[$i][1] == 1))
		{
			$logs[$i][2] = strtotime(trim($logs[$i][2]));
			$output[$logs[$i][2]] = array(
				'title'	=> $Parsedown->line(trim($logs[$i][0])),
				'brief'	=> $Parsedown->line(trim($logs[$i][3])),
				'date'	=> date('M d, Y', $logs[$i][2]),
				'time'	=> date('H.i', $logs[$i][2]),
				'slug'	=> $slug
			);
		}
	}

	krsort($output);

	$page_title = $path[count($path)-1];

	include 'header.php';

	echo '<h1>'.$page_title.'</h1>';
	echo '<div class="logs">';

	if (empty($output))
		echo '<hr>'
			.'<p>Nothing here.</p>';

	foreach ($output as $data) {
		echo '<hr>'
			.'<div class="log">'
			.'<h3><a href="'.$config['base_url'].'/'.$logs_path.'/'.$data['slug'].'">'.$data['title'].'</a></h3>'
			.'<p style="font-size:.8em; font-style:italic">'.$data['date'].' &middot; '.$data['time'].'</p>'
			.'<p>'.$data['brief'].'</p>'
			.'</div>';
	}

	echo '</div>';

	include 'footer.php';
