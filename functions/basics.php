<?php

	function path($limit = NULL)
	{
		if (isset($_GET['path']) AND (trim($_GET['path']) != NULL))
		{
			$out = array();

			if ($limit === NULL)
				$in = explode('/', htmlentities($_GET['path']));
			else
				$in = explode('/', htmlentities($_GET['path']), $limit);

			foreach ($in as $value)
			{
				if (trim($value) != NULL) array_push($out, $value);
			}

			return $out;
		}
		
		return NULL;
	}
