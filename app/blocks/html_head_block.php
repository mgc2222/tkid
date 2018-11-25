<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php echo $webpage->PageTitle?></title>

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="/images/favicons/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="/images/favicons/favicon.png" rel="icon">
    	
	<!-- Fonts-->
    <!-- <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,400i,700%7CPacifico%7CVarela+Round%7CPoppins|Tangerine:400,700|Source+Sans+Pro:300,400,600,700|Roboto:300,400,500,700|Raleway:500,600,700,800,900,400,300" rel="stylesheet"> -->

    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Give+You+Glory%3Aregular%2C100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%7CCedarville+Cursive%3Aregular%7CWaiting+for+the+Sunrise%3Aregular%7COpen+Sans%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&#038;subset=latin%2Call&#038;ver=4.7.3' type='text/css' media='all' />
   

	<meta name="description" content="<?php echo $webpage->PageDescription?>" />
	<meta name="keywords" content="<?php echo $webpage->PageKeywords?>" />

	<?php if ($webpage->PageIcon != null) { ?> <link rel="shortcut icon" href="<?php $webpage->PageIcon?>" /><?php } ?>

	<?php 
	//echo '<pre>'; print_r($webpage->StyleSheets); echo '</pre>'; die;
	if ($webpage->StyleSheets != null)
	{
		foreach ($webpage->StyleSheets as $style)
		{
			echo '<link rel="stylesheet" type="text/css" href="'._SITE_RELATIVE_URL.'style/'.$style.'" />';
		}
	}

	if ($webpage->ScriptsHeader != null)
	{
		foreach ($webpage->ScriptsHeader as $script)
		{
			echo '<script src="'.$script.'" ></script>';
		}
	}
	?>
</head>