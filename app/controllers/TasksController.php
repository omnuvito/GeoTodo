<?php

class TasksController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Response::json(Task::get());
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		Task::create(array(
			'id' 			   => Uuid::generate(),
			'id_user'		   => 'd4f7b048-70e3-11e4-abe9-d7500b443745',
			'id_task_category' => Input::get('category'),
			'title' 		   => Input::get('title'),
			'task' 			   => Input::get('task'),
			'place' 	       => Input::get('place'),
			'done' 			   => 0
		));
		return Response::json(array('success'=>true));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Response::json(Task::find($id));
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
		Task::destroy($id);
		return Response::json(array('success'=>true));
	}


}
