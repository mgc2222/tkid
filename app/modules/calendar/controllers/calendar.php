<?php
class Calendar extends AdminController
{

	function GetJsonData()
	{
	    $facebookevents = _FACEBOOK_GRAPH_API_PATH._FACEBOOK_PAGE_ID."/events/created/?since=2018&access_token="._FACEBOOK_ACCESS_TOKEN;
		$calendarData = json_decode($this->get_content($facebookevents), true);
		echo'<pre>';print_r($calendarData);die();
        //echo'<pre>';print_r($this->FormatFacebookJsonResponce($calendarData));die();
		$calendarData = file_get_contents('bootstrap_calendar/events.json');
        echo $calendarData;die();
	}
	function FormatFacebookJsonResponce($response){
	    if(!isset($response['data'])) return;
	    $ret = [];
	    foreach ($response['data'] as $key=>$val){
	        (isset($val['description'])) ? $ret['result'][$key]['description'] = $val['description'] : '';
	        (isset($val['start_time'])) ? $ret['result'][$key]['start'] = $val['start_time'] : '';
	        (isset($val['end_time'])) ? $ret['result'][$key]['start'] = $val['end'] : '';
	        (isset($val['name'])) ? $ret['result'][$key]['title'] = $val['name'] : '';
        }
        (isset($ret['result']))? $ret['success'] = 1 : '';
        return $ret;
    }

	private function get_content($URL){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $URL);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
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
