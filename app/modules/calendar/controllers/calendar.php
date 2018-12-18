<?php
class Calendar extends AdminController
{

	function GetJsonData()
	{
	    $facebookevents = "https://graph.facebook.com/v3.2/326181691509639/events/created/?access_token=EAAEry03Wk4EBAPDGUiIQZCsJnzn0RZAJeolzncaP71DQH7ZBuRUUflsLq0QK9j4lTN4YZBotay5J18O1ZCsH6KoGZBE3THom6NrAgwndc3r8yzwak4uK9LXz5sYgHxdako9UZCdm3xiEpQjXax5Ol1KNt1ucms7CEDn1RghhMPRLaRZCX7pzyyXJmjs2X3SvyXiQabZBBHicY0RmLQIPRVH5apsWWEoMEZCCg2RsVEYbfUIQZDZDhttps://graph.facebook.com/v3.2/326181691509639/events/created/?access_token=EAAEry03Wk4EBAPDGUiIQZCsJnzn0RZAJeolzncaP71DQH7ZBuRUUflsLq0QK9j4lTN4YZBotay5J18O1ZCsH6KoGZBE3THom6NrAgwndc3r8yzwak4uK9LXz5sYgHxdako9UZCdm3xiEpQjXax5Ol1KNt1ucms7CEDn1RghhMPRLaRZCX7pzyyXJmjs2X3SvyXiQabZBBHicY0RmLQIPRVH5apsWWEoMEZCCg2RsVEYbfUIQZDZD&since=2018";
		$calendarData = file_get_contents($facebookevents);
		die($calendarData);
		$calendarData = file_get_contents('bootstrap_calendar/events.json');
        echo $calendarData;die();
	}

    function GetMonthTemplate()
    {
        $calendarMonthData = file_get_contents('bootstrap_calendar/tmpls/month.html');
        //die($calendarMonthData);
        echo $calendarMonthData; die();
    }

    function GetDayTemplate()
    {
        $calendarDayData = file_get_contents('bootstrap_calendar/tmpls/day.html');
        //die($calendarDayData);
        echo $calendarDayData; die();
    }

    function GetModalTemplate()
    {
        $calendarModalData = file_get_contents('bootstrap_calendar/tmpls/modal.html');
        echo $calendarModalData; die();
    }

    function GetMonthDayTemplate()
    {
        $calendarMonthDayData = file_get_contents('bootstrap_calendar/tmpls/month-day.html');
        echo $calendarMonthDayData; die();
    }

    function GetWeekTemplate()
    {
        $calendarWeekData = file_get_contents('bootstrap_calendar/tmpls/week.html');
        echo $calendarWeekData; die();
    }

    function GetWeekDaysTemplate()
    {
        $calendarWeekDaysData = file_get_contents('bootstrap_calendar/tmpls/week-days.html');
        echo $calendarWeekDaysData; die();
    }

    function GetYearTemplate()
    {
        $calendarYearData = file_get_contents('bootstrap_calendar/tmpls/year.html');
        echo $calendarYearData; die();
    }

    function GetYearMonthTemplate()
    {
        $calendarYearMonthData = file_get_contents('bootstrap_calendar/tmpls/year-month.html');
        echo $calendarYearMonthData; die();
    }

    function GetEventsListTemplate()
    {
        $calendarEventsListData = file_get_contents('bootstrap_calendar/tmpls/events-list.html');
        echo $calendarEventsListData; die();
    }

}
?>
