<?php

namespace App\Http\Controllers;

use App\People;
use Illuminate\Http\Request;


use App\Helpers\Organizer;
use App\Http\Requests\JsonRequest;

class PeopleController extends Controller
{
    function index() {
		return view('form');
    }

    function store(JsonRequest $request) {
		$people = new People;
    	
    	$personalGroup = $request->all();

    	$organizer = new Organizer($personalGroup);

    	$people->emails = $organizer->getEmails();
    	
    	$people->data = $organizer->getInfo();

    	$people->save();

    }
}
