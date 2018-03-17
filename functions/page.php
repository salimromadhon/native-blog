<?php

	function page()
	{
		$path	= path();
		$page	= './contents/'.implode('/', $path).'.page.md';

		if ( ! file_exists($page))
			return FALSE;

		$page = file_get_contents($page);
		$page = explode('----', $page, 2);

		for ($i = 0; $i < 2; $i++)
		{
			if (( ! isset($page[$i])) OR (trim($page[$i]) == NULL))
				return FALSE;
		}

		$page['title']		= trim($page[0]);		
		$page['content']	= trim($page[1]);

		unset(
			$page[0],
			$page[1]
		);

		return $page;
	}
