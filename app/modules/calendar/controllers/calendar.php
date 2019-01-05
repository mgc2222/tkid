<?php
class Calendar extends AbstractController
{

    function __construct()
    {
        parent::__construct();

        $this->module = 'calendar';
        $this->eventsModel = $this->LoadModel('events', 'calendar');

    }

	function GetJsonData($from=null, $to=null)
	{
        $dataSearch = new StdClass();
        //$dataSearch->from = $from;
        //$dataSearch->to = $to;

        $events =  $this->GetEvents($dataSearch, '');
        echo json_encode($this->FormatEvents($events->rows));die();
        //$content = file_get_contents('bootstrap_calendar/events.json');
        //echo $content; die();

	}

    function GetEvents($dataSearch=null, $orderby=null){
        $data = new stdClass();
        $data->rows = $this->eventsModel->GetRecordsList($dataSearch, $orderby);
        return $data;
    }

    function FormatEvents($rows){
        if ($rows == null) {
            return;
        }
        $ret = [];
        $ret['status'] = 'success';
        //print_r($events);die();
        foreach ($rows as $key => $row){
            $ret['result'][$key]['id'] = $row->id;
            $ret['result'][$key]['title'] = $row->title;
            $ret['result'][$key]['class'] = $row->event_css_class;
            $ret['result'][$key]['start'] = $row->event_start_unix_milliseconds;
            $ret['result'][$key]['end'] = $row->event_end_unix_milliseconds;
            $ret['result'][$key]['status'] = $row->status;
            $ret['result'][$key]['description'] = $row->description;
            $ret['result'][$key]['short_description'] = $row->short_description;
            $ret['result'][$key]['event_type'] = $row->event_type;
            $ret['result'][$key]['event_type_id'] = $row->event_type_id;
            $ret['result'][$key]['event_external_id'] = $row->event_external_id;
        }
        return $ret;
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
