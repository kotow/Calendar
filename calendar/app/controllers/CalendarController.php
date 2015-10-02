<?php

class CalendarController extends \BaseController
{
	public $users = array();
	public $projects = array();
	public $date = array();


	public function __construct()
	{
		$this->users = DB::table('users')->get();
		$this->projects = DB::table('projects')->get();
		$this->date['now'] = new DateTime('now');
	}

	/**
	 * Display current month.
	 *
	 * @return Response
	 */
	public function index()
	{
		$calendar = $this->draw_calendar(date_format($this->date['now'], 'm'), date_format($this->date['now'], 'Y'));
		return View::make('calendar', ['calendar' => $calendar, 'users' => $this->users, 'projects' => $this->projects, 'm' => date_format($this->date['now'], 'm'), 'name' => date_format($this->date['now'], 'M')]);
	}



	/**
	 * Store a newly assigned task to user in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		DB::insert('insert into `users-tasks` (user_id, task_id, hours, date) values (?, ?, ?, ?)', array($_POST['user'], $_POST['task'], $_POST['hours'], new DateTime($_POST['date'])));
		return Redirect::to('/');
	}


	/**
	 * Display the specified month.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function show($id)
	{
		$calendar = $this->draw_calendar($id, date_format($this->date['now'], 'Y'));
		$calendar .= '<a href="/">Current</a>';
        $monthNum  = $id;
        $dateObj   = DateTime::createFromFormat('!m', $monthNum);
        $monthName = $dateObj->format('F'); // March

        return View::make('calendar', ['calendar' => $calendar, 'users' => $this->users, 'projects' => $this->projects, 'm' => $id, 'name' => $monthName]);
	}


	/**
	 * Draw calendar
	 *
	 * @param int $month
	 * @param int $year
	 * @return string
     */
	private function draw_calendar($month, $year)
	{
		if($month > 12) {
			$year = $year + intval($month/12);
			$month %= 12;
		}
		$monthNum  = $month;
		$dateObj   = DateTime::createFromFormat('!m', $monthNum);
		$monthName = $dateObj->format('F'); // March
		$calendar = '<h2>' . $monthName . ' '.$year .'</h2>';
		/* draw table */
		$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

		/* table headings */
		$headings = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
		$calendar .= '<tr class="calendar-weekdays"><td class="calendar-day-np"> </td>    <td class="calendar-day-head">' . implode('</td><td class="calendar-day-head">', $headings) . '</td></tr>';

		/* days and weeks vars now ... */
		$running_day = date('N', mktime(0, 0, 0, $month, 1, $year)) - 1;
		$days_in_month = date('t', mktime(0, 0, 0, $month, 1, $year));
		$days_in_this_week = 1;
		$day_counter = 1;

		/* row for week one */
		$calendar .= '<tr class="calendar-row">';
        $calendar .= '                <td class="calendar-img">
                    <div class="small-icons">
                        <div class="cell-row" style="height:20px;"></div>
                        <div class="cell-row">
                            <img  class="img-icon"  src="/images/small_icon_Victor.png">
                        </div>
                        <div class="cell-row ">
                            <img  class="img-icon" src="/images/small_icon_karamfil.png">
                        </div>
                        <div class="cell-row ">
                            <img  class="img-icon"  src="/images/small_icon_Mehmed.png">
                        </div>
                        <div class="cell-row ">
                            <img  class="img-icon"  src="/images/small_icon_ivaylo.png">
                        </div>
                        <div class="cell-row">
                            <img class="img-icon" src="/images/small_icon_Angelina.png">
                        </div>
                    </div>
                </td>';

		/* print "blank" days until the first of the current week */
		for ($x = 0; $x < $running_day; $x++):
			$calendar .= '<td class="calendar-day-np"> </td>';
			$days_in_this_week++;
		endfor;

		/* keep going with days.... */
		for ($list_day = 1; $list_day <= $days_in_month; $list_day++):
			$calendar .= '<td class="calendar-day">';
			/* add in the day number */
			$calendar .= '<div class="day-number">' . $list_day . '</div>';

			if ($running_day != 5 && $running_day != 6)
				$calendar .= $this->drawDay(new DateTime($year . '-' . $month . '-' . $day_counter));

			/** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! **/
			$calendar .= str_repeat('<p> </p>', 2);

			$calendar .= '</td>';
			if ($running_day == 6):
				$calendar .= '</tr>';
				if (($day_counter + 1) != $days_in_month):
					$calendar .= '<tr class="calendar-row"><td class="calendar-img">
                    <div class="small-icons">
                        <div class="cell-row" style="height:20px;"></div>
                        <div class="cell-row">
                            <img  class="img-icon"  src="/images/small_icon_Victor.png">
                        </div>
                        <div class="cell-row ">
                            <img  class="img-icon" src="/images/small_icon_karamfil.png">
                        </div>
                        <div class="cell-row ">
                            <img  class="img-icon"  src="/images/small_icon_Mehmed.png">
                        </div>
                        <div class="cell-row ">
                            <img  class="img-icon"  src="/images/small_icon_ivaylo.png">
                        </div>
                        <div class="cell-row">
                            <img class="img-icon" src="/images/small_icon_Angelina.png">
                        </div>
                    </div>
                </td>';
				endif;
				$running_day = -1;
				$days_in_this_week = 0;
			endif;
			$days_in_this_week++;
			$running_day++;
			$day_counter++;
		endfor;

		/* finish the rest of the days in the week */
		if ($days_in_this_week < 8):
			for ($x = 1; $x <= (8 - $days_in_this_week); $x++):
				$calendar .= '<td class="calendar-day-np"> </td>';
			endfor;
		endif;

		$calendar .= '</tr></table>';

		return $calendar;
	}


	/**
	 * Draw tasks per user for the day
	 * @param int $day
	 * @return string
     */
	private function drawDay($day)
	{
		$result = '<div class="cell-container">';
		foreach ($this->users as $user) {

			$userTasks = DB::table('users-tasks')->join('tasks', 'users-tasks.task_id', '=', 'tasks.id')->where('date', $day)->where('user_id', $user->id)->get();
            $result .= '<div class="cell-row hours">';
			//$result .= $user->name . '<br>';
			foreach ($userTasks as $task) {
                $result .= '<div class="hour clr-'.$user->id.' bar-'.$task->hours.'"></div>';
				//$result .= $task->hours . ' | ' . $task->name . '<br>';
			}
            $result .= '</div>';
		}
        $result .= '</div>';
		return $result;
	}

}
