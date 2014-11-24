<?php

	class Task extends Eloquent{
		protected $fillable = array('id','id_user','id_task_category','title','task','place','done');
	}