<?php
/**
 * @package   DPCalendar
 * @copyright Copyright (C) 2024 Digital Peak GmbH. <https://www.digital-peak.com>
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */

namespace DigitalPeak\Plugin\DPCalendar\HelloWorld\Extension;

defined('_JEXEC') or die();

use DPCalendar\Helper\DPCalendarHelper;
use DPCalendar\Plugin\DPCalendarPlugin;
use Joomla\CMS\Date\Date;
use Joomla\Registry\Registry;

class HelloWorld extends DPCalendarPlugin
{
    protected $identifier = 'hw';

    protected function getContent($calendarId, Date $startDate = null, Date $endDate = null, Registry $options = null): string
    {
        $calendar = $this->getDbCal($calendarId);
        if (empty($calendar)) {
            return '';
        }

        /** @var Registry $params */
        $params = $calendar->params;

        $start = DPCalendarHelper::getDate();
        $start->modify('+1 day');

        $end = clone $start;
        $end->modify('+2 hour');

        $buffer = "BEGIN:VCALENDAR
BEGIN:VEVENT
UID:sdfsf8erhklf89zrjklh890hoih89
DTSTAMP:20240714T170000Z
ORGANIZER;CN=John Doe:MAILTO:john.doe@example.com
DTSTART:" . $start->format('Ymd\THis\Z') . "
DTEND:" . $end->format('Ymd\THis\Z') . "
SUMMARY:" . $params->get('title') . "
DESCRIPTION:This is a demo event in the hello world DPCalendar plugin.
LOCATION:New York
RRULE:FREQ=WEEKLY;BYDAY=MO,FR
END:VEVENT
END:VCALENDAR";

        return $buffer;
    }
}
