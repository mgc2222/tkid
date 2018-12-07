<head>
    <meta charset="utf-8"/>
	<title><?php echo $webpage->PageTitle?></title>

	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=yes" >
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="alternate" hreflang="<?php echo $webpage->languageAbb?>" href="<?php echo _SITE_URL.$webpage->PageRoute?>" />
    <link rel="apple-touch-icon" sizes="57x57" href="images/favicons/apple-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="60x60" href="images/favicons/apple-icon-60x60.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="images/favicons/apple-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="images/favicons/apple-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="images/favicons/apple-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="images/favicons/apple-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="images/favicons/apple-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="images/favicons/apple-icon-152x152.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="images/favicons/apple-icon-180x180.png" />
    <link rel="icon" type="image/png" sizes="192x192"  href="images/favicons/android-icon-192x192.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicons/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="96x96" href="images/favicons/favicon-96x96.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicons/favicon-16x16.png" />
    <link rel="manifest" href="images/favicons/manifest.json" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="msapplication-TileImage" content="images/favicons/ms-icon-144x144.png" />
    <meta name="theme-color" content="#ffffff" />
    	
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
			echo '<script src="'._SITE_RELATIVE_URL.'js/'.$script.'" ></script>';
		}
	}
	?>
</head>