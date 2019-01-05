<?php
	$routes = [];
	$routes['ajax'] = 'ajax/ajax/HandleRequest';
	
	$routes[''] = 'home/home/GetViewData';
	$routes['change_language'] = 'languages/change_language/SetSelectedLanguage';
	$routes['tmpls/month.html'] = 'calendar/calendar/GetMonthTemplate';
	$routes['tmpls/day.html'] = 'calendar/calendar/GetDayTemplate';
	$routes['tmpls/month-day.html'] = 'calendar/calendar/GetMonthDayTemplate';
	$routes['tmpls/modal.html'] = 'calendar/calendar/GetModalTemplate';
	$routes['tmpls/week.html'] = 'calendar/calendar/GetWeekTemplate';
	$routes['tmpls/week-days.html'] = 'calendar/calendar/GetWeekDaysTemplate';
	$routes['tmpls/year.html'] = 'calendar/calendar/GetYearTemplate';
	$routes['tmpls/year-month.html'] = 'calendar/calendar/GetYearMonthTemplate';
	$routes['tmpls/events-list.html'] = 'calendar/calendar/GetEventsListTemplate';
	$routes['events'] = 'calendar/calendar/HandleAjaxRequest';

	
	// {id} must be a number (\d+)
	// $r->addRoute('GET', '/modules/login/{id:\d+}', 'get_user_handler');
	// The /{title} suffix is optional
	// $r->addRoute('GET', '/articles/{id:\d+}[/{title}]', 'get_article_handler');
?>