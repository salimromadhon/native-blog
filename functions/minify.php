<?php

	function minify($input)
	{
		return preg_replace('/(?>[^\S ]\s*|\s{2,})(?=(?:(?:[^<]++|<(?!\/?(?:textarea|pre)\b))*+)(?:<(?>textarea|pre)\b|\z))/ix', '', $input);
	}
