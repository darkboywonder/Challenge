<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{

	/**
     * Away with you unwanted timestamps.
     *
     * @var string
     */
	public $timestamps = false;
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'people';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['emails', 'data'];    
}
