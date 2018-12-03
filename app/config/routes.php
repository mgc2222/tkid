<?php
	$routes = [];
	$routes['ajax'] = 'ajax/ajax/HandleRequest';
	
	$routes[''] = 'home/home/GetViewData';
	$routes['change_language'] = 'languages/change_language/SetSelectedLanguage';

	
	// {id} must be a number (\d+)
	// $r->addRoute('GET', '/modules/login/{id:\d+}', 'get_user_handler');
	// The /{title} suffix is optional
	// $r->addRoute('GET', '/articles/{id:\d+}[/{title}]', 'get_article_handler');
?>