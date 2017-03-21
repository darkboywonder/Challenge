<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Helpers\Organizer;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class JackieRobinsonTest extends TestCase
{
    /**
     * CLEVER, I looked at the history
     *
     * @return Boolean
     */

    /** @test */
    public function jackie_robinson_number_must_equal_42()
    {	
    	$data = [
    		[
    			"first_name" => "Shawn",
    			"last_name" => "Jones",
    			"age" => "32",
    			"email" => "shawn.greg.jones@gmail.com",
    			"secret" => "mem172946",
    		],
    		[
    			"first_name" => "Maria",
    			"last_name" => "Jones",
    			"age" => "37",
    			"email" => "jonesmariaelena@gmail.com",
    			"secret" => "jones2724",
    		],
    	];
    	
    	$organizer = new organizer($data);
        
        $this->assertTrue($organizer->getJackieRobinsonJerseyNumber() === 42);
    }
}
