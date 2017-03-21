<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Hash;

class Organizer
{
	protected $peopleInfo;
	protected $emails;
	protected $jackieRobinsonNumber;

	public function __construct($people) {

		$this->peopleInfo = $this->collectInfo($people);
		
		$this->emails = $this->collectEmails($people);

		$this->jackieRobinsonNumber = 42;

	}

	/**
     * Returns peopleInfo field on class:
     * 
     * @return array
     *
     */
	public function getInfo() {

		return $this->peopleInfo;

	}

	/**
     * Returns emails field on class:
     * 
     * @return array
     *
     */
	public function getEmails() {

		return $this->emails;

	}

	/**
     * Returns my stored cleverness field on class
     * 
     * @return int
     *
     */

	public function getJackieRobinsonJerseyNumber() {
		
		return $this->jackieRobinsonNumber;
	}

	/**
     * Receives raw request and organizes data per request:
     * creates 'name' field per person and 
     * organizes personal by age
     * 
     * @var array of people
     * @return array of people
     *
     */

	private function collectInfo($people) {
		$people = $this->hashSecret($people);
		$generalInfo['data'] = $this->sortInfoByAge($this->addNameField($people));
		$jsonInfo = json_encode($generalInfo);
		return $jsonInfo;
	}

	/**
     * Collects email address from each person in the array.
     * @var array of people
     * @return array of emails
     *
     */

	private function collectEmails($people) {
		$emails = array_map(function($contact) { return $contact['email']; }, $people);
		$jsonEmails = json_encode($emails);
		return $jsonEmails;
	}

	/**
     * Sorts array of people by their age in descending order.
     * @var array
     * @return array
     *
     */

	private function sortInfoByAge($people) {
		if(sizeof($people) > 1) {
			usort($people, function($person1, $person2){
				if ($person1['age'] == $person2['age']) {
	        		return 0;
	    		}
    			return ($person1['age'] < $person2['age']) ? 1 : -1;
			});
		}
		return $people;
	}

	/**
     * Creates a name field with first_name and last_name concatenated.
     * @var array of people
     * @return array of people with added 'name' field
     *
     */

	private function addNameField($people) {
		$group = [];
		foreach($people as $person) {
			$person['name'] = $person['first_name'] . " " . $person['last_name'];
			array_push($group, $person);
		}
		return $group;
	}

	/**
     * hashes each individual's seccret field so no one knows
     * @var array of people
     * @return array of people with added 'secret' field encrypted
     *
     */
	private function hashSecret($people) {
		$group = [];
		foreach($people as $person) {
			$person['secret'] = Hash::make($person['secret']);
			array_push($group, $person);
		}
		return $group;
	}
}
