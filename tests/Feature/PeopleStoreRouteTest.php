<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PeopleStoreRouteTest extends TestCase
{
	 use DatabaseMigrations;
    /**
     * Tests successful completion of Json POST Request
     *
     * @return Status 200
     * @return A record in people database
     */

    /** @test */
    public function valid_json_request_to_people_store_route_is_successful()
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

    	$response = $this->json('POST','/people/store', $data);
        
        $response->assertStatus(200);

        $this->assertDatabaseHas('people', ['id' => '1']);        
    }
}
