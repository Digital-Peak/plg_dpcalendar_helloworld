<?php
/**
 * @package    DPCalendar
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2017 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
defined('_JEXEC') or die();

class PlgDPCalendarHelloworld extends \DPCalendar\Plugin\DPCalendarPlugin
{

	protected $identifier = 'hw';

	protected function getContent ($calendarId, JDate $startDate = null, JDate $endDate = null, JRegistry $options)
	{
		$start = DPCalendarHelper::getDate();
		$start->modify('+1 day');

		$end = clone $start;
		$end->modify('+2 hour');

		$buffer = "BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//DPCalendar
BEGIN:VEVENT
UID:sdfsf8erhklf89zrjklh890hoih89
DTSTAMP:20140714T170000Z
ORGANIZER;CN=John Doe:MAILTO:john.doe@example.com
DTSTART:" . $start->format('Ymd\THis\Z') . "
DTEND:" . $end->format('Ymd\THis\Z') . "
SUMMARY:Demo Hello world event
DESCRIPTION:This is a demo event in the hello world DPCalendar plugin.
LOCATION:New York
END:VEVENT
END:VCALENDAR";
		return $buffer;
	}
}
