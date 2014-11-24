<?php

	class Category extends Eloquent{
		protected $table = 'categories';
		protected $fillable = array('id','category');
	}