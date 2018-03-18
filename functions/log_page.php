<?php

	function log_page($path = NULL)
	{
		if ($path == NULL)
			return FALSE;

		$log	= './contents/'.implode('/', $path).'.log.md';

		if ( ! file_exists($log))
			return FALSE;

		$log = file_get_contents($log);
		$log = explode('----', $log, 5);

		for ($i = 0; $i < 5; $i++)
		{
			if (( ! isset($log[$i])) OR (trim($log[$i]) == NULL))
				return FALSE;
		}

		$log['title']	= trim($log[0]);		
		$log['visible']	= trim($log[1]);
		$log['date']	= date('M d, Y', strtotime(trim($log[2])));
		$log['time']	= date('H.i', strtotime(trim($log[2])));
		$log['brief']	= trim($log[3]);
		$log['content']	= trim($log[4]);

		unset(
			$log[0],
			$log[1],
			$log[2],
			$log[3],
			$log[4]
		);

		return $log;
	}
