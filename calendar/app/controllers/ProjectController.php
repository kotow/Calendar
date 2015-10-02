<?php

class ProjectController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$projects = DB::table('projects')->get();
		return View::make('project.index', ['username' =>  '<script>alert("shurrr");</script>', 'projects' => $projects]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('project.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		DB::insert('insert into projects ( name) values (?)', array($_POST['name']));
		return Redirect::to('project');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$project = DB::select('select * from projects where id = ?', array($id));
		$tasks = DB::table('tasks')->where('project_id', $id)->get();//DB::select('select * from tasks where project_id = ?', array($id));
		$project[0]->est = 0;
		$project[0]->spend = 0;
		foreach ($tasks as $task) {
			$ss = DB::select('select SUM(hours) as h from `users-tasks` where task_id = ?', array($task->id));
			$task->timeSpend = $ss[0]->h ? $ss[0]->h:0;
			$project[0]->est += $task->time_estimated;
			$project[0]->spend += $task->timeSpend;
		}

		return View::make('project.projectDetails', ['project' =>  $project[0], 'tasks' => $tasks]);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
