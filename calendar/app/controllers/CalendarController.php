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
		return View::make('calendar2', ['calendar' => $calendar, 'users' => $this->users, 'projects' => $this->projects, 'm' => date_format($this->date['now'], 'm'), 'name' => date_format($this->date['now'], 'F')]);
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
		//$calendar .= '<a href="/">Current</a>';
        $monthNum  = $id;
        $dateObj   = DateTime::createFromFormat('!m', $monthNum);
        $monthName = $dateObj->format('F'); // March

        return View::make('calendar2', ['calendar' => $calendar, 'users' => $this->users, 'projects' => $this->projects, 'm' => $id, 'name' => $monthName]);
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
        $week = 1;
		if($month > 12) {
			$year = $year + intval($month/12);
			$month %= 12;
		}
		$monthNum  = $month;
		$dateObj   = DateTime::createFromFormat('!m', $monthNum);
		$calendar['month'] = trim($dateObj->format('F') . '-' . $year); // March
		$calendar['headings'] = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');

		/* days and weeks vars now ... */
		$running_day = date('N', mktime(0, 0, 0, $month, 1, $year)) - 1;
		$days_in_month = date('t', mktime(0, 0, 0, $month, 1, $year));
		$days_in_this_week = 1;
		$day_counter = 1;

		/* print "blank" days until the first of the current week */
		for ($x = 0; $x < $running_day; $x++):
			//$calendar .= '<td class="calendar-day-np"> </td>';
			$calendar['weeks'][$week]['empty'] = $running_day;
            $days_in_this_week++;
		endfor;

		/* keep going with days.... */
		for ($list_day = 1; $list_day <= $days_in_month; $list_day++):
            $calendar['weeks'][$week]['days'][$list_day] = $list_day;
			if ($running_day != 5 && $running_day != 6)
                $calendar['weeks'][$week]['days'][$list_day] = $this->drawDay(new DateTime($year . '-' . $month . '-' . $day_counter));
			if ($running_day == 6):
				//if (($day_counter + 1) != $days_in_month):
                    $week++;
                    $calendar['weeks'][$week]['empty'] = null;
				//endif;
				$running_day = -1;
				$days_in_this_week = 0;
			endif;
			$days_in_this_week++;
			$running_day++;
			$day_counter++;
		endfor;


//echo '<pre>';var_dump($calendar);echo '</pre>';
		return $calendar;
	}


	/**
	 * Draw tasks per user for the day
	 * @param int $day
	 * @return string
     */
	private function drawDay($day)
	{
        $info = array();
		$result = '<div class="cell-container">';
		foreach ($this->users as $user) {
            $info[$user->name] = array();
			$userTasks = DB::table('users-tasks')->join('tasks', 'users-tasks.task_id', '=', 'tasks.id')->where('date', $day)->where('user_id', $user->id)->get();
            //echo '<pre>';var_dump($day, $userTasks);echo '</pre>';
            $result .= '<div class="cell-row hours">';
			//$result .= $user->name . '<br>';
			foreach ($userTasks as $task) {

                $info[$user->name][$task->id] = $task->hours;
                $result .= '<div class="hour clr-'.$user->id.' bar-'.$task->hours.'"></div>';
				//$result .= $task->hours . ' | ' . $task->name . '<br>';
			}
            $result .= '</div>';
		}
        $result .= '</div>';
		return $info;
	}

}
