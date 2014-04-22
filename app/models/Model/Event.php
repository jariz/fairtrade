<?php

namespace Model;

class Event extends Eloquent {

	protected $table = 'events';
	public $timestamps = true;
	protected $softDelete = false;

}