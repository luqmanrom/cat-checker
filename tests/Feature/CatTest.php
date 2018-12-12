<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CatTest extends TestCase
{
    public function testFirstTest()
    {
	    $response = $this->json('POST', '/api/search', ['input' => 'The softbottomcat is jumping over a memecat and fell down on top of catnips']);

        $response->assertStatus(200)
	        ->assertExactJson([
		        'result' => ["softbottomcat","memecat"],
	        ]);
    }

    public function testSecondTest() {
	    $response = $this->json('POST', '/api/search', ['input' => 'Electrocatosis is a process where a oxycat is transmuted-cat into hydrogen cat']);

	    $response->assertStatus(200)
		    ->assertExactJson([
			    'result' => ["oxycat",
				    "transmuted-cat"],
		    ]);
    }

	public function testThirdTest() {
		$response = $this->json('POST', '/api/search', ['input' => 'When cat hits the fan, the cat and the fan shall become one catfan']);

		$response->assertStatus(200)
			->assertExactJson([
				'result' => [],
			]);
	}
}
