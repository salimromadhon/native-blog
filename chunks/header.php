<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title><?php echo ((isset($page_title) AND ($page_title != NULL)) ? $page_title.' &middot; '.$config['site_title'] : $config['site_title']) ?></title>
	<style>
		* {
			line-height:1.5em;
		}
		hr {
			border:none;
			border-top:1px solid;
		}
		a {
			color:#03e;
			text-decoration:none;
		}
		a:hover {
			text-decoration:underline;			
		}
	</style>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $config['base_url'] ?>/assets/images/favicon.png">
	<link rel="apple-touch-icon" href="<?php echo $config['base_url'] ?>/assets/images/favicon.png">
</head>
<body style="margin:3em auto; max-width:600px; padding:0 2em">
<?php
	
	$nav = $path;
	
	$url = implode('/', $nav);

	if ($nav == NULL OR ($url == $config['home_page']) OR ($url == $config['error_page']))
	{
		$nav = '';
	}
	else
	{
		$url = $config['base_url'];
	
		for($i = 0; $i < count($nav); $i++)
		{
			$url		.= '/'.$nav[$i];
			$nav[$i]	 = '<a href="'.$url.'">'.$nav[$i].'</a>';
		}

		$nav = '/'.implode('/', $nav);
	}

	echo '<div class="site-header"><div class="site-title"><strong>'.strtoupper($config['site_title']).'</strong></div><div class="site-nav"><code><a href="'.$config['base_url'].'">&bull;&bull;&bull;</a>'.$nav.'</code></div></div>';
