<?php
	$routes = [];
	$routes['ajax'] = 'ajax/ajax/HandleRequest';
	
	$routes[''] = 'home/home/GetViewData';
	$routes['saverio'] = 'home/home/GetViewData';
	$routes['contact'] = 'contact/contact/GetViewData';
	$routes['meniu'] = 'serving_menu/serving_menu/GetViewData';
	$routes['meniu/{data:.+}'] = 'serving_menu/serving_menu/GetViewData/$1';
	
	
	
	// {id} must be a number (\d+)
	// $r->addRoute('GET', '/modules/login/{id:\d+}', 'get_user_handler');
	// The /{title} suffix is optional
	// $r->addRoute('GET', '/articles/{id:\d+}[/{title}]', 'get_article_handler');
?>